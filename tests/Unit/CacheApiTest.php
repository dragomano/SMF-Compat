<?php declare(strict_types=1);

use Bugo\Compat\Utils;
use Bugo\Compat\CacheApi;

beforeEach(function () {
	Utils::$context['tmp'] = [];
});

test('get method', function () {
	expect(CacheApi::get('foo'))->toBeNull();
});

test('put method', function () {
	CacheApi::put('foo', 'bar');

	expect(Utils::$context['tmp']['foo'])->toBe('bar');
});

test('clean method', function () {
	CacheApi::clean();

	expect(Utils::$context['tmp'])->toBeEmpty();
});
