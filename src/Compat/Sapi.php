<?php declare(strict_types=1);

/**
 * Sapi.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat;

use function memoryReturnBytes;
use function sm_temp_dir;

class Sapi
{
	public static function memoryReturnBytes(string $val): int
	{
		return memoryReturnBytes($val);
	}

	public static function getTempDir(): string
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Admin.php';

		return sm_temp_dir();
	}

	public static function setTimeLimit(int $limit = 600): void
	{
		@set_time_limit($limit);
	}
}
