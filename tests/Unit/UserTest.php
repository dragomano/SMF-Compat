<?php declare(strict_types=1);

use Bugo\Compat\User;

beforeAll(function () {
	new User();
});

test('constructor', function () {
	expect(User::$info)->toBeArray();
	expect(User::$profiles)->toBeArray();
	expect(User::$settings)->toBeArray();
	expect(User::$memberContext)->toBeArray();
	expect(User::$me)->toBeInstanceOf(User::class);
});

test('allowedTo method', function () {
	expect(User::$me->allowedTo('foo_bar'))->toBeTrue();
	expect(User::$me->allowedTo('foo'))->toBeFalse();
});

test('hasPermission method', function () {
	expect(User::hasPermission('foo_bar'))->toBeTrue();
	expect(User::hasPermission('foo'))->toBeFalse();
});

test('checkSession method', function () {
	expect(User::$me->checkSession())->toBeEmpty();
});

test('sessionCheck method', function () {
	expect(User::sessionCheck())->toBeEmpty();
});

test('isAllowedTo method', function () {
	try {
		User::$me->isAllowedTo('foo_bar');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('mustHavePermission method', function () {
	expect(User::mustHavePermission('foo_bar'))->toBeTrue();
});

test('loadMemberData method', function () {
	expect(User::loadMemberData(['foo_bar']))->toBeArray();
});

test('loadMemberContext method', function () {
	expect(User::loadMemberContext(1))->toBeTrue();
});

test('membersAllowedTo method', function () {
	expect(User::membersAllowedTo('foo_bar'))->toBe(['foo_bar']);
});

test('updateMemberData method', function () {
	try {
		User::updateMemberData([1], ['foo' => 'bar']);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
