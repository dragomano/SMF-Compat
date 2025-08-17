<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use BadMethodCallException;

use function function_exists;

/**
 * @method static array|null topBoards(int $num_top = 10, string $output_method = 'echo')
 */
class ServerSideIncludes
{
	public static function __callStatic(string $name, array $arguments)
	{
		$method = 'ssi_' . $name;

		if (function_exists($method)) {
			return $method(...$arguments);
		}

		throw new BadMethodCallException(self::class . ": method `$name` does not exist.");
	}
}
