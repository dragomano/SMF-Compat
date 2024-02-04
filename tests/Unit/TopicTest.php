<?php declare(strict_types=1);

use Bugo\Compat\Topic;

beforeAll(function () {
	new Topic();
});

test('constructor', function () {
	expect(Topic::$id)->toBe(0);
});
