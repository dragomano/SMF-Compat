<?php declare(strict_types=1);

use Bugo\Compat\Lang;

beforeEach(function () {
	$this->lang = new Lang();
});

test('constructor', function () {
	expect($this->lang::$txt)->toBeArray()
		->and($this->lang::$editortxt)->toBeArray();
});

test('censorText method', function () {
	$source = 'foo';

	Lang::censorText($source);

	expect($source)->toBe('changed');
});

test('get method', function () {
	expect($this->lang::get())->toBeArray();
});

test('load method', function () {
	$this->lang::load('bar');

	expect(Lang::$txt['foo'])->toBe('bar');
});

test('sentenceList method', function () {
	expect($this->lang::sentenceList(['foo', 'bar']))->toBeString();
});
