<?php declare(strict_types=1);

use Bugo\Compat\Config;

beforeEach(function () {
	$this->config = new Config();
});

test('constructor', function () {
	expect($this->config::$modSettings)->toBeArray()
		->and($this->config::$mbname)->toBeString()
		->and($this->config::$scripturl)->toBeString()
		->and($this->config::$boardurl)->toBeString()
		->and($this->config::$boarddir)->toBeString()
		->and($this->config::$sourcedir)->toBeString()
		->and($this->config::$cachedir)->toBeString()
		->and($this->config::$db_server)->toBeString()
		->and($this->config::$db_name)->toBeString()
		->and($this->config::$db_user)->toBeString()
		->and($this->config::$db_passwd)->toBeString()
		->and($this->config::$db_type)->toBeString()
		->and($this->config::$db_port)->toBeInt()
		->and($this->config::$db_prefix)->toBeString()
		->and($this->config::$language)->toBeString()
		->and($this->config::$db_mb4)->toBeNull()
		->and($this->config::$cache_enable)->toBeInt()
		->and($this->config::$db_show_debug)->toBeBool();
});

test('updateModSettings method', function () {
	expect(isset(Config::$modSettings['foo']))->toBeFalse();

	$this->config::updateModSettings(['foo' => 'bar']);

	expect(Config::$modSettings['foo'])->toBe('bar');
});

test('updateSettingsFile method', function () {
	$this->config::$sourcedir = dirname(__DIR__) . '/files';

	expect($this->config::updateSettingsFile(['foo' => 'bar']))->toBeBool();
});
