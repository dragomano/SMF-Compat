<?php declare(strict_types=1);

use Bugo\Compat\Mail;

test('loadEmailTemplate method', function () {
	expect(Mail::loadEmailTemplate('foo_bar'))->toBeArray();
});

test('send method', function () {
	try {
		Mail::send(['test@test.com'], 'foo', 'bar');
		$result = 'success';
	} catch (ErrorException $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
