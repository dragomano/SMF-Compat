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

test('optimize_table method', function () {
	expect($this->db->optimize_table(''))
		->toBeInt();
});

test('list_tables method', function () {
	expect($this->db->list_tables())
		->toBeArray();
});

test('get_version method', function () {
	expect($this->db->get_version())
		->toBeString();
});

test('create_table method', function () {
	expect($this->db->create_table('', []))
		->toBeFalse();
});

test('__call method', function () {
	expect($this->db->unknown($this->params))
		->toBeFalse();
});
