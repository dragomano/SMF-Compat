<?php declare(strict_types=1);

namespace Bugo\Compat\Debug;

use Bugo\Compat\Config;

class DebugUtils
{
	public static function isDebugEnabled(): bool
	{
		return isset(Config::$db_show_debug) && Config::$db_show_debug === true;
	}

	public static function disable(): void
	{
		Config::$db_show_debug = false;
	}
}
