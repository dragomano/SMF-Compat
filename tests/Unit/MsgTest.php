<?php declare(strict_types=1);

use Bugo\Compat\Msg;

test('preparseCode method', function () {
	$source = 'foo';

	Msg::preparseCode($source);

	expect($source)->toBe('changed');
});

test('unPreparseCode method', function () {
	expect(Msg::unPreparseCode('foo'))->toBe('foo');
});
