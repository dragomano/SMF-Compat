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
use Mentions as ExternalMentions;

use function method_exists;

class Mentions
{
	protected static $char = '@';

	public static function __callStatic(string $name, array $arguments)
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Mentions.php';

		if (! method_exists(ExternalMentions::class, $name)) {
			throw new BadMethodCallException("Method `$name` does not exist in Mentions class");
		}

		return ExternalMentions::$name(...$arguments);
	}
}
