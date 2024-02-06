<?php declare(strict_types=1);

use Bugo\Compat\Db;
use Bugo\Compat\Utils;

beforeEach(function () {
	$this->db = new Db();

	Utils::$smcFunc['db_query'] = fn(...$params) => ['foo' => 'bar'];
	Utils::$smcFunc['db_query'] = fn(...$params) => ['foo' => 'bar'];

	$this->params = ['', '', []];
});

test('__call method', function () {
	expect($this->db->query($this->params))
		->toEqual(Utils::$smcFunc['db_query']($this->params));
});

test('__call method with $name = search_query', function () {
	expect($this->db->search_query($this->params))
		->toEqual(Utils::$smcFunc['db_query']($this->params));
});

test('__call method with unknown $name', function () {
	expect($this->db->unknown($this->params))
		->toBeFalse();
});
