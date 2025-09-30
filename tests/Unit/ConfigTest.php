<?php declare(strict_types=1);

use Bugo\Compat\Config;
use SMF\Config as SMFConfig;

beforeEach(function () {
	$this->config = new Config();

	$this->config::$sourcedir = dirname(__DIR__) . '/files';
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
	expect($this->config::updateSettingsFile(['foo' => 'bar']))->toBeBool();
});

test('safeFileWrite method', function () {
	expect($this->config::safeFileWrite('file.txt', 'some data'))->toBeBool();
});

test('set method', function () {
	// Test setting multiple properties
	Config::set([
		'mbname' => 'Test Forum',
		'db_server' => 'localhost',
		'cache_enable' => 1
	]);

	expect(Config::$mbname)->toBe('Test Forum')
		->and(Config::$db_server)->toBe('localhost')
		->and(Config::$cache_enable)->toBe(1);
});

require_once dirname(__DIR__, 2) . '/vendor/simplemachines/30/Sources/Config.php';

dataset('canonical path data', [
	[__FILE__, __FILE__],
	['non-existing.txt', 'non-existing.txt'],
	['', realpath('')],
	['foo\\bar/baz', 'foo' . DIRECTORY_SEPARATOR . 'bar' . DIRECTORY_SEPARATOR . 'baz'],
	['foo/./bar', 'foo' . DIRECTORY_SEPARATOR . 'bar'],
	['foo/../bar', 'bar'],
	['foo/bar/../baz', 'foo' . DIRECTORY_SEPARATOR . 'baz'],
	['../foo', '..' . DIRECTORY_SEPARATOR . 'foo'],
	[__DIR__, __DIR__],
	['./subdir', 'subdir'],
	['foo/../..', '..'],
	['foo//bar', 'foo' . DIRECTORY_SEPARATOR . 'bar'],
	['/foo/bar', (DIRECTORY_SEPARATOR === '\\' ? substr(getcwd(), 0, strcspn(getcwd(), '\\')) . '\\foo\\bar' : '/foo/bar')],
]);

test('canonicalPath method', function ($input, $expected) {
	expect(Config::canonicalPath($input))->toBe($expected);
})->with('canonical path data');

test('original SMF canonicalPath method', function ($input, $expected) {
	expect(SMFConfig::canonicalPath($input))->toBe($expected);
})->with('canonical path data');
