<?php declare(strict_types=1);

use Bugo\Compat\Url;

beforeEach(function () {
	$this->obj = new Url('https://www.simplemachines.org/index.php');
});

test('constructor', function () {
	expect((string) $this->obj)->toBe('https://www.simplemachines.org/index.php')
		->and($this->obj->port)->toBeInt();
});

test('create method', function () {
	$obj = Url::create('https://demo.dragomano.ru');

	expect($obj->parse())->toBe([
		'scheme' => 'https',
		'host'   => 'demo.dragomano.ru',
	]);
});

test('normalize method', function () {
	expect((string) $this->obj->normalize())->toBeString();
});

test('parse method', function () {
	$obj = Url::create('https://some.url:8080');
	$parsed = $obj->parse();

	expect($obj->port)->toBeInt()
		->and($parsed)->toBe([
			'scheme' => 'https',
			'host'   => 'some.url',
			'port'   => 8080,
		]);
});

test('proxied method', function () {
	expect((string) $this->obj->proxied())->toBeString();
});
