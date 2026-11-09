<?php declare(strict_types=1);

use Bugo\Compat\Db\FuncMapper;
use Bugo\Compat\Db\ReturnMode;
use Bugo\Compat\Utils;

test('enum cases exist', function () {
	expect(ReturnMode::cases())->toHaveCount(3)
		->and(ReturnMode::Off->value)->toBe(0)
		->and(ReturnMode::SingleRow->value)->toBe(1)
		->and(ReturnMode::MultiRow->value)->toBe(2);
});

test('tryFrom works', function () {
	expect(ReturnMode::tryFrom(0))->toBe(ReturnMode::Off)
		->and(ReturnMode::tryFrom(1))->toBe(ReturnMode::SingleRow)
		->and(ReturnMode::tryFrom(2))->toBe(ReturnMode::MultiRow)
		->and(ReturnMode::tryFrom(3))->toBeNull();
});

test('insert method accepts both an int and an enum case as return mode', function () {
	$args = [];

	Utils::$smcFunc['db_insert'] = function (...$params) use (&$args) {
		$args = $params;

		return 0;
	};

	$mapper = new FuncMapper();

	expect($mapper->insert('insert', '{db_prefix}log_online', [], [], [], 2))->toBe(0)
		->and($args[5])->toBe(2)
		->and($mapper->insert('insert', '{db_prefix}log_online', [], [], [], ReturnMode::SingleRow))->toBe(0)
		->and($args[5])->toBe(1)
		->and($mapper->insert('insert', '{db_prefix}log_online', [], [], [], ReturnMode::MultiRow))->toBe(0)
		->and($args[5])->toBe(2)
		->and($mapper->insert('insert', '{db_prefix}log_online', [], [], []))->toBe(0)
		->and($args[5])->toBe(ReturnMode::Off->value);
});
