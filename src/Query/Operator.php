<?php

namespace spkm\Jamf\Query;

use InvalidArgumentException;

/**
 * The comparisons Jamf's RSQL filters take. A value compared with == or != may hold * as a wildcard.
 */
enum Operator: string
{
    case Equal = '==';
    case NotEqual = '!=';
    case LessThan = '<';
    case LessOrEqual = '<=';
    case GreaterThan = '>';
    case GreaterOrEqual = '>=';
    case In = '=in=';
    case NotIn = '=out=';

    /**
     * The operator for what a caller wrote: RSQL's own (==, =lt=, =in=), or the ones Eloquent takes (=, <>, in, not in).
     */
    public static function fromString(string $operator): self
    {
        return match (strtolower(trim($operator))) {
            '=', '==', '=eq=' => self::Equal,
            '!=', '<>', '=ne=' => self::NotEqual,
            '<', '=lt=' => self::LessThan,
            '<=', '=le=' => self::LessOrEqual,
            '>', '=gt=' => self::GreaterThan,
            '>=', '=ge=' => self::GreaterOrEqual,
            'in', '=in=' => self::In,
            'not in', '=out=' => self::NotIn,
            default => throw new InvalidArgumentException('"'.$operator.'" is not an operator Jamf\'s filters take.'),
        };
    }

    /**
     * Whether the operator compares with a list of values.
     */
    public function takesList(): bool
    {
        return $this === self::In || $this === self::NotIn;
    }
}
