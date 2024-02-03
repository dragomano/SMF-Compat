<?php declare(strict_types=1);

/**
 * User.php
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

class ServerSideIncludes
{
	public static function __callStatic(string $name, array $arguments)
	{
		$name = 'ssi_' . $name;

		if (function_exists($name))
			return $name(...$arguments);

		return false;
	}
}
