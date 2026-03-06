<?php declare(strict_types=1);

namespace Bugo\Compat;

use BadMethodCallException;

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
