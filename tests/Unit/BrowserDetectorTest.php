<?php declare(strict_types=1);

use Bugo\Compat\BrowserDetector;
use Bugo\Compat\Utils;

beforeEach(function () {
	$this->detector = new BrowserDetector();

	unset(Utils::$context['browser']);
});

test('call method', function () {
	expect(empty(Utils::$context['browser']))->toBeTrue();

	$this->detector::call();

	expect(Utils::$context['browser'])->toBeArray()
		->toHaveKey('chrome');
});

test('isBrowser method', function () {
	$this->detector::call();

	expect($this->detector::isBrowser('chrome'))->toBeTrue();
});
