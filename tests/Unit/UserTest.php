<?php declare(strict_types=1);

use Bugo\Compat\User;

beforeEach(function () {
	$this->user = new User(1);

	User::$me->formatted = [];
});

test('constructor', function () {
	expect($this->user::$info)->toBeArray()
		->and($this->user::$profiles)->toBeArray()
		->and($this->user::$settings)->toBeArray()
		->and($this->user::$memberContext)->toBeArray()
		->and($this->user::$me)->toBeInstanceOf(User::class);
});

test('allowedTo method', function () {
	expect($this->user::$me->allowedTo('foo_bar'))->toBeTrue()
		->and($this->user::$me->allowedTo('foo'))->toBeFalse();
});

test('boardsAllowedTo method', function () {
	expect($this->user::$me->boardsAllowedTo('post_new'))->toBeArray();
});

test('checkSession method', function () {
	expect($this->user::$me->checkSession())->toBeEmpty();
});

test('isAllowedTo method', function () {
	try {
		$this->user::$me->isAllowedTo('foo_bar');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('format method', function () {
	expect($this->user::$me->format())->toBeArray();

	User::$me->formatted = [1 => []];

	expect($this->user::$me->format())->toBe([1 => []]);
});

test('membersAllowedTo method', function () {
	expect($this->user::membersAllowedTo('foo_bar'))->toContain('foo_bar');
});

test('updateMemberData method', function () {
	try {
		$this->user::updateMemberData([1], ['foo' => 'bar']);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('load method', function () {
	expect($this->user::load())->toBeArray()
		->and($this->user::load(2))->toBeArray()
		->and($this->user::load([3, 4]))->toBeArray();
});
