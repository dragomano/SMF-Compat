<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

class RequireHelper
{
	public static function requireFile(string $file): void
	{
		$file = Config::$sourcedir . DIRECTORY_SEPARATOR . $file;

		if (file_exists($file)) {
			require_once($file);
		}
	}
}
