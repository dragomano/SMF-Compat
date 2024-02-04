<?php declare(strict_types=1);

use Bugo\Compat\BBCodeParser;

test('load method', function () {
	expect(BBCodeParser::load())->toBe(BBCodeParser::load());
});

test('parse method', function () {
	expect(BBCodeParser::load()->parse('foo'))->toBeString();
});
