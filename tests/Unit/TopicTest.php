<?php declare(strict_types=1);

use Bugo\Compat\Topic;

test('constructor', function () {
	$this->topic = new Topic();

	expect($this->topic::$id)->toBe(0);
});

test('create method', function () {
	$msgOptions = ['body' => 'Test message'];
	$topicOptions = ['board' => 1, 'subject' => 'Test topic'];
	$posterOptions = ['id' => 1];

	expect(Topic::create($msgOptions, $topicOptions, $posterOptions))->toBeTrue();
});

test('approve method', function () {
	expect(Topic::approve(1))->toBeTrue()
		->and(Topic::approve([1, 2]))->toBeTrue();
});

test('remove method', function () {
	expect(Topic::remove(1))->toBeTrue();
});
