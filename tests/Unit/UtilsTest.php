<?php declare(strict_types=1);

use Bugo\Compat\Utils;

beforeAll(function () {
	new Utils();
});

test('constructor', function () {
	expect(Utils::$context)->toBeArray();
	expect(Utils::$smcFunc)->toBeArray();
});

test('escapeJavaScript method', function () {
	expect(Utils::escapeJavaScript('foo_bar'))->toBeString();
});

test('obExit method', function () {
	try {
		Utils::obExit();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('redirectexit method', function () {
	try {
		Utils::redirectexit();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('sendHttpStatus method', function () {
	try {
		Utils::sendHttpStatus(404);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('shorten method', function () {
	expect(Utils::shorten('foo'))->toBeString();
});

test('makeWritable method', function () {
	expect(Utils::makeWritable('test.php'))->toBeTrue();
});

test('jsonDecode method', function () {
	expect(Utils::jsonDecode('foo'))->toBeArray();
});

test('htmlspecialcharsDecode method', function () {
	expect(Utils::htmlspecialcharsDecode('foo'))->toBeString();
});
