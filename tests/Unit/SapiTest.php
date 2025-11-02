<?php declare(strict_types=1);

use Bugo\Compat\Sapi;
use SMF\Sapi as BaseSapi;

test('memoryReturnBytes method', function () {
	expect(Sapi::memoryReturnBytes('256M'))->toBeInt();
});

test('getTempDir method', function () {
	expect(Sapi::getTempDir())->toBeString();
});

test('setTimeLimit method', function () {
	try {
		Sapi::setTimeLimit(100);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('httpsOn method', function () {
	expect(Sapi::httpsOn())->toBeBool();
});

require_once dirname(__DIR__, 2) . '/vendor/simplemachines/30/Sources/Sapi.php';

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
	expect(Sapi::canonicalPath($input))->toBe($expected);
})->with('canonical path data');

test('original SMF canonicalPath method', function ($input, $expected) {
	expect(BaseSapi::canonicalPath($input))->toBe($expected);
})->with('canonical path data');
