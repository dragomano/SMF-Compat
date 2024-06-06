<?php declare(strict_types=1);

/**
 * ServerSideIncludes.php
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

use function function_exists;

class ServerSideIncludes
{
	public static function __callStatic(string $name, array $arguments)
	{
		$name = 'ssi_' . $name;

		if (function_exists($name)) {
			return $name(...$arguments);
		}

		return false;
	}
}
