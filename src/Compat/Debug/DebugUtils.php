<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

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
