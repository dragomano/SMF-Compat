<?php declare(strict_types=1);

use Bugo\Compat\Db\DatabaseApi;
use Bugo\Compat\Db\FuncMapper;

beforeEach(function () {
	$this->db = new DatabaseApi();
});

test('constructor', function () {
	expect($this->db::$count)->toBeInt()
		->and($this->db::$cache)->toBeArray()
		->and($this->db::$db)->toEqual(new FuncMapper());
});
