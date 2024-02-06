<?php declare(strict_types=1);

use Bugo\Compat\Database;
use Bugo\Compat\Db;

beforeEach(function () {
	$this->db = new Database();
});

test('constructor', function () {
	expect($this->db::$count)->toBeInt()
		->and($this->db::$cache)->toBeArray()
		->and($this->db::$db)->toEqual(new Db());
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
