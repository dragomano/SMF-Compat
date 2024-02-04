<?php declare(strict_types=1);

use Bugo\Compat\Lang;

beforeAll(function () {
	new Lang();
});

test('constructor', function () {
	expect(Lang::$txt)->toBeArray();
	expect(Lang::$editortxt)->toBeArray();
});

test('censorText method', function () {
	$source = 'foo';

	Lang::censorText($source);

	expect($source)->toBe('changed');
});

test('get method', function () {
	expect(Lang::get())->toBeArray();
});

test('load method', function () {
	Lang::load('bar');

	expect(Lang::$txt['foo'])->toBe('bar');
});

test('sentenceList method', function () {
	expect(Lang::sentenceList(['foo', 'bar']))->toBeString();
});
