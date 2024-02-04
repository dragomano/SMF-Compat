<?php declare(strict_types=1);

use Bugo\Compat\ErrorHandler;
use Bugo\Compat\Utils;

test('fatal method', function () {
	ErrorHandler::fatal('foo');

	expect(Utils::$context['error_title'])->toBe('foo');
});

test('fatalLang method', function () {
	ErrorHandler::fatalLang('bar');

	expect(Utils::$context['error_title'])->toBe('bar');
});

test('log method', function () {
	expect(ErrorHandler::log('test'))->toBeString();
});
