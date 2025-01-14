<?php declare(strict_types=1);

use Bugo\Compat\Url;

beforeEach(function () {
	$this->obj = new Url('https://example.com/index.php');
});

test('constructor', function () {
	expect($this->obj->url)->toBe('https://example.com/index.php')
		->and((string) $this->obj)->toBe($this->obj->url);
});

test('create method', function () {
	expect((string) $this->obj::create('https://some.url'))->toBe((string) new Url('https://some.url'));
});

test('normalize method', function () {
	expect($this->obj->normalize()->url)->toBeString();
});

test('parse method', function () {
	expect($this->obj->parse(PHP_URL_PATH))->toBe('/index.php');
});

test('proxied method', function () {
	expect($this->obj->proxied()->url)->toBeString();
});
