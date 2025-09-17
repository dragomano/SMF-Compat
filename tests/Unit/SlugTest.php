<?php declare(strict_types=1);

use Bugo\Compat\Config;
use Bugo\Compat\Slug;

test('getCached method', function () {
	expect(Slug::getCached('topic', 1))->toBeString();

	Config::$modSettings['cache_enable'] = '1';

	expect(Slug::getCached('topic', 1))->toBeString();
});

test('getCached method when cache disabled', function () {
	Config::$modSettings['cache_enable'] = '';

	expect(Slug::getCached('topic', 3))->toBe('');
});

test('create method', function () {
	$slug = Slug::create('Test String', 'topic', 1);

	expect($slug)->toBeInstanceOf(Slug::class);
});

test('setRequested method', function () {
	Slug::setRequested('custom-slug', 'topic', 1);

	expect(Slug::$known['topic'][1])->toBeInstanceOf(Slug::class);
});

test('__toString method', function () {
	$slug = Slug::create('Test String', 'topic', 1);

	expect((string) $slug)->toBeString();
});
