<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Parsers;

use function parse_bbc;

class BBCodeParser
{
	private static array $parsers;

	public function __construct(public bool $for_print = false) {}

	public static function load(bool $for_print = false): object
	{
		if (! isset(self::$parsers[(int) $for_print])) {
			self::$parsers[(int) $for_print] = new self($for_print);
		}

		return self::$parsers[(int) $for_print];
	}

	public function parse(
		string|bool $message,
		bool $smileys = true,
		string|int $cache_id = '',
		array $parse_tags = []
	): array|string
	{
		return parse_bbc($message, $smileys, $cache_id, $parse_tags);
	}
}
