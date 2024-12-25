<?php declare(strict_types=1);

/**
 * DbFuncMapper.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function array_key_exists;

class DbFuncMapper
{
	public function __call(string $name, array $arguments)
	{
		if (array_key_exists('db_' . $name, Utils::$smcFunc)) {
			ErrorHandler::log('[LP] This function is not implemented yet: ' . $name);
		}

		return false;
	}

	public function query(string $identifier, string $db_string, array $db_values = []): object|bool
	{
		return Utils::$smcFunc['db_query']($identifier, $db_string, $db_values);
	}

	public function fetch_row(object $result): array|false|null
	{
		return Utils::$smcFunc['db_fetch_row']($result);
	}

	public function fetch_assoc(object $result): array|false|null
	{
		return Utils::$smcFunc['db_fetch_assoc']($result);
	}

	public function fetch_all(object $request): array
	{
		return Utils::$smcFunc['db_fetch_all']($request) ?? [];
	}

	public function free_result(object $result): bool
	{
		return Utils::$smcFunc['db_free_result']($result) ?? false;
	}

	public function insert(
		string $method,
		string $table,
		array $columns,
		array $data,
		array $keys,
		int $returnmode = 0
	): int|array|null
	{
		return Utils::$smcFunc['db_insert']($method, $table, $columns, $data, $keys, $returnmode);
	}

	public function insert_id(string $table, ?string $field = null, ?object $connection = null): int
	{
		return Utils::$smcFunc['db_insert_id']($table, $field, $connection);
	}

	public function num_rows(object $result): int
	{
		return Utils::$smcFunc['db_num_rows']($result);
	}

	public function affected_rows(?object $connection = null): int
	{
		return Utils::$smcFunc['db_affected_rows']($connection);
	}

	public function transaction(string $type = 'commit', ?object $connection = null): bool
	{
		return Utils::$smcFunc['db_transaction']($type, $connection);
	}

	public function optimize_table(string $table): int|float
	{
		Db::extend();

		return Utils::$smcFunc['db_optimize_table']($table);
	}

	public function list_tables(string|bool $db = false, string|bool $filter = false): array
	{
		Db::extend();

		return Utils::$smcFunc['db_list_tables']($db, $filter);
	}

	public function get_version(): string
	{
		Db::extend();

		return Utils::$smcFunc['db_get_version']();
	}

	public function get_vendor(): string
	{
		Db::extend();

		return Utils::$smcFunc['db_get_vendor']();
	}

	public function add_column(
		string $table_name,
		array $column_info,
		array $parameters = [],
		string $if_exists = 'update',
		string $error = 'fatal'
	): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_add_column']($table_name, $column_info, $parameters, $if_exists, $error);
	}

	public function add_index(
		string $table_name,
		array $index_info,
		array $parameters = [],
		string $if_exists = 'update',
		string $error = 'fatal'
	): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_add_index']($table_name, $index_info, $parameters, $if_exists, $error);
	}

	public function change_column(string $table_name, string $old_column, array $column_info): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_change_column']($table_name, $old_column, $column_info);
	}

	public function create_table(
		string $table_name,
		array $columns,
		array $indexes = [],
		array $parameters = [],
		string $if_exists = 'ignore',
		string $error = 'fatal'
	): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_create_table']($table_name, $columns, $indexes, $parameters, $if_exists, $error);
	}

	public function table_structure(string $table_name): array
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_table_structure']($table_name);
	}

	public function list_columns(string $table_name, bool $detail = false, array $parameters = []): array
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_list_columns']($table_name, $detail, $parameters);
	}

	public function list_indexes(string $table_name, bool $detail = false, array $parameters = []): array
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_list_indexes']($table_name, $detail, $parameters);
	}

	public function remove_column(
		string $table_name,
		string $column_name,
		array $parameters = [],
		string $error = 'fatal'
	): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_remove_column']($table_name, $column_name, $parameters, $error);
	}

	public function remove_index(
		string $table_name,
		string $index_name,
		array $parameters = [],
		string $error = 'fatal'
	): bool
	{
		Db::extend('packages');

		return Utils::$smcFunc['db_remove_index']($table_name, $index_name, $parameters, $error);
	}
}
