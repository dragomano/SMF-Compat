<?php declare(strict_types=1);

use Bugo\Compat\Attachment;

beforeEach(function () {
	$this->attachment = new Attachment();
});

test('create method', function () {
	$options = ['tmp_name' => 'somefile'];

	expect($this->attachment::create($options))->toBeBool();
});

test('remove method', function () {
	expect($this->attachment::remove(['id_attach' => 1]))->toBeArray();
});
