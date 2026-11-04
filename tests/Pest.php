<?php

use Saloon\Config;
use spkm\Jamf\Tests\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Every test boots the package in Testbench with an array cache. No request may reach a real Jamf: anything sent
| without a mock client throws a StrayRequestException. Fake Jamf with Tests\Helpers\FakeJamf.
|
*/

Config::preventStrayRequests();

pest()->extend(TestCase::class)->in('Feature', 'Spec');
