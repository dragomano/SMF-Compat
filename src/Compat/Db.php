<?php declare(strict_types=1);

/**
 * Db.php
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

use function db_extend;

class Db
{
	public static int $count = 0;

	public static array $cache = [];

	public static object $db;

	public function __construct()
	{
		if (! isset($GLOBALS['db_count'])) {
			$GLOBALS['db_count'] = 0;
		}

		self::$count = &$GLOBALS['db_count'];

		if (! isset($GLOBALS['db_cache'])) {
			$GLOBALS['db_cache'] = [];
		}

		self::$cache = &$GLOBALS['db_cache'];

		if (! isset(self::$db)) {
			self::$db = new DbFuncMapper();
		}
	}

	public static function extend(string $type = 'extra'): void
	{
		db_extend($type);
	}
}
