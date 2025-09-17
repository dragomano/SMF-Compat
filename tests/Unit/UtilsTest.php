<?php declare(strict_types=1);

use Bugo\Compat\Utils;

beforeEach(function () {
	$this->utils = new Utils();
});

test('constructor', function () {
	expect($this->utils::$context)->toBeArray()
		->and($this->utils::$smcFunc)->toBeArray();
});

test('escapeJavaScript method', function () {
	expect($this->utils::escapeJavaScript('foo_bar'))->toBeString();
});

test('obExit method', function () {
	try {
		$this->utils::obExit();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('redirectexit method', function () {
	try {
		$this->utils::redirectexit();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('sendHttpStatus method', function () {
	try {
		$this->utils::sendHttpStatus(404);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('shorten method', function () {
	expect($this->utils::shorten('foo'))->toBeString();
});

test('makeWritable method', function () {
	expect($this->utils::makeWritable('test.php'))->toBeTrue();
});

test('jsonDecode method', function () {
	expect($this->utils::jsonDecode('foo'))->toBeArray();
});

test('jsonEncode method', function () {
	expect($this->utils::jsonEncode('foo'))->toBe(json_encode('foo'));
});

test('htmlspecialchars method', function () {
	$source = '<a href="test">Test</a>';
	$result = htmlspecialchars($source);

	expect($this->utils::htmlspecialchars($source))->toBe($result);
});

test('htmlspecialcharsDecode method', function () {
	expect($this->utils::htmlspecialcharsDecode('foo'))->toBeString();
});

test('getMimeType method', function () {
	expect($this->utils::getMimeType('foo'))->toBeString();
});

test('getCallable with function name', function () {
	$callable = 'strlen';
	$result = $this->utils::getCallable($callable);

	expect($result)->toBe(['', 'strlen']);
});

test('getCallable with static method', function () {
	$callable = 'Bugo\\Compat\\Utils::escapeJavaScript';
	$result = $this->utils::getCallable($callable);

	expect($result)->toBe(['Bugo\\Compat\\Utils', 'escapeJavaScript']);
});

test('getCallable with array callable', function () {
	$callable = ['Bugo\\Compat\\Utils', 'escapeJavaScript'];
	$result = $this->utils::getCallable($callable);

	expect($result)->toBe(['Bugo\\Compat\\Utils', 'escapeJavaScript']);
});

test('getCallable with closure', function () {
	$callable = function () {
		return 'test';
	};

	$result = $this->utils::getCallable($callable);

	expect($result)->toBe($callable);
});

test('getCallable with object method', function () {
	$object = new class {
		public function testMethod(): string
		{
			return 'object method';
		}
	};

	$callable = [$object, 'testMethod'];
	$result = $this->utils::getCallable($callable);

	expect($result)->toBe([$object, 'testMethod']);
});

test('getCallable with invalid function', function () {
	$callable = 'nonexistent_function';
	$result = $this->utils::getCallable($callable);

	expect($result)->toBeFalse();
});

test('getCallable with invalid static method', function () {
	$callable = 'NonExistentClass::nonExistentMethod';
	$result = $this->utils::getCallable($callable);

	expect($result)->toBeFalse();
});

test('getCallable with invalid callable', function () {
	$callable = 'invalid_string';
	$result = $this->utils::getCallable($callable);

	expect($result)->toBeFalse();
});
