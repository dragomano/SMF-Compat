<?php declare(strict_types=1);

use Bugo\Compat\Db;
use Bugo\Compat\DbFuncMapper;

beforeEach(function () {
	$this->db = new Db();
});

test('constructor', function () {
	expect($this->db::$count)->toBeInt()
		->and($this->db::$cache)->toBeArray()
		->and($this->db::$db)->toEqual(new DbFuncMapper());
});

test('extend method', function () {
	try {
		$this->db::extend();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
