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

test('insert_id method', function () {
	expect($this->db->insert_id(''))
		->toBeInt();
});

test('affected_rows method', function () {
	expect($this->db->affected_rows())
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

test('get_vendor method', function () {
	expect($this->db->get_vendor())
		->toBeString();
});

test('add_column method', function () {
	expect($this->db->add_column('', []))
		->toBeTrue();
});

test('add_index method', function () {
	expect($this->db->add_index('', []))
		->toBeTrue();
});

test('change_column method', function () {
	expect($this->db->change_column('', '', []))
		->toBeTrue();
});

test('create_table method', function () {
	expect($this->db->create_table('', []))
		->toBeTrue();
});

test('table_structure method', function () {
	expect($this->db->table_structure('name'))
		->toBeArray();
});

test('list_columns method', function () {
	expect($this->db->list_columns('name'))
		->toBeArray();
});

test('list_indexes method', function () {
	expect($this->db->list_indexes('name'))
		->toBeArray();
});

test('remove_column method', function () {
	expect($this->db->remove_column('', ''))
		->toBeTrue();
});

test('remove_index method', function () {
	expect($this->db->remove_index('', ''))
		->toBeTrue();
});

test('__call not implemented method', function () {
	Utils::$smcFunc['db_some_func'] = fn(...$params) => [$params];

	expect(Utils::$context['num_errors'])->toBe(0);

	$this->db->some_func($this->params);

	expect(Utils::$context['num_errors'])->toBe(1);
});

test('__call unknown method', function () {
	expect($this->db->unknown($this->params))
		->toBeFalse();
});
