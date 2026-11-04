<?php

use Carbon\CarbonImmutable;
use spkm\Jamf\Query\Filter;
use spkm\Jamf\Query\Operator;
use spkm\Jamf\Query\Query;

enum ExampleFilterStatus: string
{
    case Managed = 'MANAGED';
}

enum ExampleFilterLevel: int
{
    case High = 3;
}

it('quotes text and escapes the quotes and backslashes in it', function () {
    expect(Filter::value('iPad 1'))->toBe('"iPad 1"')
        ->and(Filter::value('say "hi"'))->toBe('"say \"hi\""')
        ->and(Filter::value('C:\\Lab'))->toBe('"C:\\\\Lab"')
        ->and(Filter::value(''))->toBe('""');
});

it('writes numbers and booleans as they are', function () {
    expect(Filter::value(5))->toBe('5')
        ->and(Filter::value(1.5))->toBe('1.5')
        ->and(Filter::value(true))->toBe('true')
        ->and(Filter::value(false))->toBe('false');
});

it('writes an enum by its value, a date in ISO 8601 with its offset, and a Stringable as text', function () {
    $stringable = new class implements Stringable
    {
        public function __toString(): string
        {
            return 'Lab A';
        }
    };

    expect(Filter::value(ExampleFilterStatus::Managed))->toBe('"MANAGED"')
        ->and(Filter::value(ExampleFilterLevel::High))->toBe('3')
        ->and(Filter::value(CarbonImmutable::parse('2026-01-02T03:04:05+01:00')))->toBe('"2026-01-02T02:04:05.000Z"')
        ->and(Filter::value($stringable))->toBe('"Lab A"');
});

it('refuses a value that has no place in a filter', function (mixed $value) {
    Filter::value($value);
})->with([
    'null' => [null],
    'array' => [[1, 2]],
    'object' => [new stdClass],
])->throws(InvalidArgumentException::class);

it('takes field names with dots for nested fields', function () {
    expect(Filter::field('id'))->toBe('id')
        ->and(Filter::field('general.name'))->toBe('general.name')
        ->and(Filter::field('userAndLocation.realName'))->toBe('userAndLocation.realName')
        ->and(Filter::field('_private_1'))->toBe('_private_1');
});

it('refuses a field name that could change the filter', function (string $field) {
    Filter::field($field);
})->with([
    'empty' => [''],
    'a quote' => ['name"'],
    'an operator' => ['name==x'],
    'a separator' => ['name;id'],
    'a bracket' => ['name)'],
    'a space' => ['general name'],
    'a leading dot' => ['.name'],
    'a trailing dot' => ['name.'],
    'a leading digit' => ['1name'],
])->throws(InvalidArgumentException::class);

it('reads the operators RSQL and Eloquent write', function (string $written, Operator $operator) {
    expect(Operator::fromString($written))->toBe($operator);
})->with([
    ['=', Operator::Equal], ['==', Operator::Equal], ['=eq=', Operator::Equal],
    ['!=', Operator::NotEqual], ['<>', Operator::NotEqual], ['=ne=', Operator::NotEqual],
    ['<', Operator::LessThan], ['=lt=', Operator::LessThan],
    ['<=', Operator::LessOrEqual], ['=le=', Operator::LessOrEqual],
    ['>', Operator::GreaterThan], ['=gt=', Operator::GreaterThan],
    ['>=', Operator::GreaterOrEqual], ['=ge=', Operator::GreaterOrEqual],
    ['in', Operator::In], ['=in=', Operator::In], [' IN ', Operator::In],
    ['not in', Operator::NotIn], ['=out=', Operator::NotIn],
]);

it('refuses an operator Jamf does not take', function () {
    Operator::fromString('like');
})->throws(InvalidArgumentException::class, '"like" is not an operator');

it('knows which operators take a list', function () {
    expect(Operator::In->takesList())->toBeTrue()
        ->and(Operator::NotIn->takesList())->toBeTrue()
        ->and(Operator::Equal->takesList())->toBeFalse()
        ->and(Operator::GreaterThan->takesList())->toBeFalse();
});

it('writes a list comparison with its values in brackets, and a single value as a list of one', function () {
    expect(Filter::comparison('id', Operator::In, [1, 2, 3]))->toBe('id=in=(1,2,3)')
        ->and(Filter::comparison('general.name', Operator::NotIn, ['a', 'b']))->toBe('general.name=out=("a","b")')
        ->and(Filter::comparison('id', Operator::In, 7))->toBe('id=in=(7)')
        ->and(Filter::comparison('id', Operator::In, new ArrayIterator([4, 5])))->toBe('id=in=(4,5)');
});

it('refuses a list comparison without values', function () {
    Filter::comparison('id', Operator::In, []);
})->throws(InvalidArgumentException::class, 'needs at least one value');

it('joins comparisons with ; for AND and , for OR', function () {
    $filter = Filter::make()->where('id', '>', 5)->where('general.name', '==', 'iPad*');

    expect($filter->toString())->toBe('id>5;general.name=="iPad*"')
        ->and((string) Filter::make()->where('id', '=', 1)->or('id==2', 'id==3'))->toBe('id==1,id==2,id==3');
});

it('brackets a group that joins differently from its parent', function () {
    $either = Filter::make()->where('id', '=', 1)->or(Filter::make()->where('id', '=', 2));
    $filter = Filter::make()->where('managed', '=', true)->and($either);

    expect($filter->toString())->toBe('managed==true;(id==1,id==2)')
        ->and(Filter::make()->where('a', '=', 1)->where('b', '=', 2)->or('c==3')->toString())->toBe('(a==1;b==2),c==3');
});

it('ignores empty parts and is empty until given one', function () {
    $filter = Filter::make()->and('', Filter::make())->or(Filter::make());

    expect($filter->isEmpty())->toBeTrue()
        ->and($filter->toString())->toBe('')
        ->and(Filter::make()->and(Filter::make()->where('id', '=', 1))->toString())->toBe('id==1');
});

it('is immutable', function () {
    $base = Filter::make()->where('id', '=', 1);
    $base->where('id', '=', 2);
    $base->or('id==3');

    expect($base->toString())->toBe('id==1');
});

it('gives the query parameters Jamf reads', function () {
    $query = Query::make()
        ->with('exception-handling', 'LENIENT')
        ->sections(['general', ExampleFilterStatus::Managed])
        ->where('id', '>', 5)
        ->orderBy('general.name')
        ->orderBy('id', 'DESC')
        ->page(2)
        ->pageSize(50);

    expect($query->toArray())->toBe([
        'exception-handling' => 'LENIENT',
        'section' => ['GENERAL', 'MANAGED'],
        'filter' => 'id>5',
        'sort' => 'general.name:asc,id:desc',
        'page' => 2,
        'page-size' => 50,
    ])
        ->and($query->getSort())->toBe(['general.name:asc', 'id:desc'])
        ->and($query->getSections())->toBe(['GENERAL', 'MANAGED'])
        ->and($query->getPage())->toBe(2)
        ->and($query->getPageSize())->toBe(50);
});

it('leaves out what was not asked for', function () {
    expect(Query::make()->toArray())->toBe([])
        ->and(Query::make()->page(1)->pageSize(10)->withoutPaging()->toArray())->toBe([]);
});

it('refuses a negative page, a page size below one and an unknown sort direction', function (Closure $build) {
    $build();
})->with([
    'negative page' => [fn () => Query::make()->page(-1)],
    'zero page size' => [fn () => Query::make()->pageSize(0)],
    'sideways sort' => [fn () => Query::make()->orderBy('id', 'sideways')],
    'bad sort field' => [fn () => Query::make()->orderBy('id;drop')],
])->throws(InvalidArgumentException::class);

it('reads as a plain query string', function () {
    $query = Query::make()->where('general.name', '=', 'iPad 1')->sections(['GENERAL', 'HARDWARE'])->pageSize(5);

    expect((string) $query)->toBe('section=GENERAL&section=HARDWARE&filter=general.name=="iPad 1"&page-size=5');
});

it('builds a new query each time rather than changing the one it was given', function () {
    $base = Query::make();
    $base->where('id', '=', 1);
    $base->orderBy('id');
    $base->page(1);

    expect($base->toArray())->toBe([]);
});
