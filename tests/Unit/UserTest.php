<?php declare(strict_types=1);

use Bugo\Compat\User;

beforeEach(function () {
	$this->user = new User();
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

test('hasPermission method', function () {
	expect($this->user::hasPermission('foo_bar'))->toBeTrue()
		->and($this->user::hasPermission('foo'))->toBeFalse();
});

test('checkSession method', function () {
	expect($this->user::$me->checkSession())->toBeEmpty();
});

test('sessionCheck method', function () {
	expect($this->user::sessionCheck())->toBeEmpty();
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

test('mustHavePermission method', function () {
	expect($this->user::mustHavePermission('foo_bar'))->toBeTrue();
});

test('loadMemberData method', function () {
	expect($this->user::loadMemberData(['foo_bar']))->toBeArray();
});

test('loadMemberContext method', function () {
	expect($this->user::loadMemberContext(1))->toBeTrue();
});

test('membersAllowedTo method', function () {
	expect($this->user::membersAllowedTo('foo_bar'))->toBe(['foo_bar']);
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
