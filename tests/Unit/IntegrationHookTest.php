<?php declare(strict_types=1);

use Bugo\Compat\IntegrationHook;

test('call method', function () {
	expect(IntegrationHook::call('foo_bar'))->toBeArray();
});

test('add method', function () {
	try {
		IntegrationHook::add('foo_bar', 'some_func');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('remove method', function () {
	try {
		IntegrationHook::remove('foo_bar', 'some_func');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
