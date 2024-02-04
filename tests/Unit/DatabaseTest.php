<?php declare(strict_types=1);

use Bugo\Compat\Database;
use Exception;

beforeAll(function () {
	new Database();
});

test('constructor', function () {
	expect(Database::$count)->toBeInt();
	expect(Database::$cache)->toBeArray();
});

test('extend method', function () {
	try {
		Database::extend();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
