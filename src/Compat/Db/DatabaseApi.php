<?php declare(strict_types=1);

namespace Bugo\Compat\Db;

class DatabaseApi
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
			self::$db = new FuncMapper();
		}
	}
}
