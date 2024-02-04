<?php declare(strict_types=1);

use Bugo\Compat\Config;

beforeAll(function () {
	new Config();
});

test('constructor', function () {
	expect(Config::$modSettings)->toBeArray();
	expect(Config::$scripturl)->toBeString();
	expect(Config::$boardurl)->toBeString();
	expect(Config::$boarddir)->toBeString();
	expect(Config::$sourcedir)->toBeString();
	expect(Config::$cachedir)->toBeString();
	expect(Config::$db_type)->toBeString();
	expect(Config::$db_prefix)->toBeString();
	expect(Config::$language)->toBeString();
	expect(Config::$cache_enable)->toBeInt();
	expect(Config::$db_show_debug)->toBeBool();
});

test('updateModSettings method', function () {
	expect(isset(Config::$modSettings['foo']))->toBeFalse();

	Config::updateModSettings(['foo' => 'bar']);

	expect(Config::$modSettings['foo'])->toBe('bar');
});
