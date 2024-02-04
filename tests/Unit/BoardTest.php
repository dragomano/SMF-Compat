<?php declare(strict_types=1);

use Bugo\Compat\Board;

beforeAll(function () {
	new Board();
});

test('constructor', function () {
	expect(Board::$id)->toBe(0);
	expect(Board::$info)->toBeArray();
	expect(Board::$loaded)->toBeArray();
});
