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
	public function query(string $identifier, string $db_string, array $db_values = []): object|bool
	{
		return Utils::$smcFunc['db_query']($identifier, $db_string, $db_values);
	}

	public function search_query(string $identifier, string $db_string, array $db_values = []): object|bool
	{
		return $this->query($identifier, $db_string, $db_values);
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
		return Utils::$smcFunc['db_fetch_all']($request);
	}

	public function free_result(object $result): bool
	{
		return Utils::$smcFunc['db_free_result']($result);
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

	public function num_rows(object $result): int
	{
		return Utils::$smcFunc['db_num_rows']($result);
	}

	public function transaction(string $type = 'commit'): bool
	{
		return Utils::$smcFunc['db_transaction']($type);
	}

	public function get_version(): string
	{
		return Utils::$smcFunc['db_get_version']();
	}
}
