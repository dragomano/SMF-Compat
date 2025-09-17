<?php declare(strict_types=1);

use Bugo\Compat\Mail;

test('loadEmailTemplate method with default parameters', function () {
	expect(Mail::loadEmailTemplate('foo_bar'))->toBeArray();
});

test('loadEmailTemplate method with custom parameters', function () {
	$replacements = ['key' => 'value'];
	$lang = 'english';

	expect(Mail::loadEmailTemplate('foo_bar', $replacements, $lang, false))->toBeArray();
});

test('send method with minimal parameters', function () {
	try {
		Mail::send(['test@test.com'], 'foo', 'bar');
		$result = 'success';
	} catch (ErrorException $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('send method with all parameters', function () {
	try {
		Mail::send(
			['test@test.com'],
			'Subject',
			'Message',
			'from@example.com',
			'message-id',
			true,
			1,
			false,
			true
		);
		$result = 'success';
	} catch (ErrorException $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('send method with string recipient', function () {
	try {
		Mail::send('test@test.com', 'foo', 'bar');
		$result = 'success';
	} catch (ErrorException $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('send method with exception', function () {
	expect(Mail::send(['test@test.com'], '', 'bar'))->toBeFalse();
});
