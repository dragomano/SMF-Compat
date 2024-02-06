<?php declare(strict_types=1);

use Bugo\Compat\Board;

test('constructor', function () {
	$this->board = new Board();

	expect($this->board::$id)->toBe(0)
		->and($this->board::$info)->toBeArray()
		->and($this->board::$loaded)->toBeArray();
});
