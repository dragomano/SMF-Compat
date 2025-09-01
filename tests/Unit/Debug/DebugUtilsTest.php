<?php declare(strict_types=1);

use Bugo\Compat\Config;
use Bugo\Compat\Debug\DebugUtils;

beforeEach(function () {
	Config::$db_show_debug = false;

	$this->utils = new DebugUtils();
});

test('isDebugEnabled method', function () {
	expect($this->utils::isDebugEnabled())->toBeFalse();

	Config::$db_show_debug = true;

	expect($this->utils::isDebugEnabled())->toBeTrue();
});

test('disable method', function () {
	Config::$db_show_debug = true;

	expect($this->utils::isDebugEnabled())->toBeTrue();

	$this->utils::disable();

	expect($this->utils::isDebugEnabled())->toBeFalse();
});
