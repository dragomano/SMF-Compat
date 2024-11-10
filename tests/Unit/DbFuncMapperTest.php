<?php declare(strict_types=1);

use Bugo\Compat\DbFuncMapper;
use Bugo\Compat\Utils;

beforeEach(function () {
	$this->db = new DbFuncMapper();

	$this->params = ['', '', []];
	$this->resourse = new \stdClass();
});

test('query method', function () {
	expect($this->db->query(...$this->params))
		->toEqual(Utils::$smcFunc['db_query'](...$this->params));
});

test('search_query method', function () {
	expect($this->db->search_query(...$this->params))
		->toEqual(Utils::$smcFunc['db_search_query'](...$this->params));
});

test('fetch_row method', function () {
	expect($this->db->fetch_row($this->resourse))
		->toBeArray();
});

test('fetch_assoc method', function () {
	expect($this->db->fetch_assoc($this->resourse))
		->toBeArray();
});

test('fetch_all method', function () {
	expect($this->db->fetch_all($this->resourse))
		->toBeArray();
});

test('insert method', function () {
	expect($this->db->insert('', '', [], [], []))
		->toBeInt();
});

test('transaction method', function () {
	expect($this->db->transaction())
		->toBeTrue();
});

test('get_version method', function () {
	expect($this->db->get_version())
		->toBeString();
});
