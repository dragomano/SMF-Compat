<?php declare(strict_types=1);

use Bugo\Compat\Sapi;

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
