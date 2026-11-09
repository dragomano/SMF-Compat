<?php declare(strict_types=1);

use Bugo\Compat\Db\FuncMapper;
use Bugo\Compat\Db\InsertType;
use Bugo\Compat\Utils;

test('enum cases exist', function () {
	expect(InsertType::cases())->toHaveCount(3)
		->and(InsertType::Insert->value)->toBe('insert')
		->and(InsertType::Replace->value)->toBe('replace')
		->and(InsertType::Ignore->value)->toBe('ignore');
});

test('tryFrom works', function () {
	expect(InsertType::tryFrom('insert'))->toBe(InsertType::Insert)
		->and(InsertType::tryFrom('replace'))->toBe(InsertType::Replace)
		->and(InsertType::tryFrom('ignore'))->toBe(InsertType::Ignore)
		->and(InsertType::tryFrom('invalid'))->toBeNull();
});

test('insert method accepts both a string and an enum case', function () {
	$args = [];

	Utils::$smcFunc['db_insert'] = function (...$params) use (&$args) {
		$args = $params;

		return 0;
	};

	$mapper = new FuncMapper();

	expect($mapper->insert('replace', '{db_prefix}log_online', [], [], ['session']))->toBe(0)
		->and($args[0])->toBe('replace')
		->and($mapper->insert(InsertType::Ignore, '{db_prefix}log_online', [], [], ['session']))->toBe(0)
		->and($args[0])->toBe('ignore');
});
