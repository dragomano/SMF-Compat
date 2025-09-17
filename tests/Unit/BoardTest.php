<?php declare(strict_types=1);

use Bugo\Compat\Board;

test('constructor', function () {
	$this->board = new Board();

	expect($this->board::$id)->toBe(0)
		->and($this->board::$info)->toBeArray()
		->and($this->board::$loaded)->toBeArray();
});

test('constructor with id', function () {
	$board = new Board(5);

	expect($board::$id)->toBe(5);
});

test('constructor with props', function () {
	$board = new Board(null, ['info' => ['name' => 'Test Board']]);

	expect($board::$info)->toEqual(['name' => 'Test Board']);
});
