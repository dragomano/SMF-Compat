<?php declare(strict_types=1);

use Bugo\Compat\ServerSideIncludes;

test('topBoards method', function () {
	expect(ServerSideIncludes::topBoards(10, 'array'))->toBeArray();
});

test('unknown method', function () {
	expect(ServerSideIncludes::unknown())->toBeFalse();
});
