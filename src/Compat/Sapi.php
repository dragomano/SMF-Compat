<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function httpsOn;
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

	public static function httpsOn(): bool
	{
		return httpsOn();
	}
}
