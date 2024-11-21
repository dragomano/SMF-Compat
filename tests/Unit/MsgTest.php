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
