<?php declare(strict_types=1);

use Bugo\Compat\IntegrationHook;
use Exception;

test('call method', function () {
	expect(IntegrationHook::call('foo_bar'))->toBeArray();
});

test('add method', function () {
	try {
		IntegrationHook::add('foo_bar', self::class);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
