<?php declare(strict_types=1);

use Bugo\Compat\Msg;

test('preparseCode method', function () {
	$source = 'foo';

	Msg::preparseCode($source);

	expect($source)->toBe('changed');
});

test('un_preparsecode method', function () {
	expect(Msg::un_preparsecode('foo'))->toBe('foo');
});

test('create method', function () {
	$msgOptions = [];
	$topicOptions = [];
	$posterOptions = ['id' => 1];

	expect(Msg::create($msgOptions, $topicOptions, $posterOptions))->toBeTrue();
});

test('modify method', function () {
	$msgOptions = ['id' => 1];
	$topicOptions = [];
	$posterOptions = [];

	expect(Msg::modify($msgOptions, $topicOptions, $posterOptions))->toBeTrue();
});

test('approve method', function () {
	expect(Msg::approve(1))->toBeTrue();
});

test('remove method', function () {
	expect(Msg::remove(1))->toBeTrue();
});
