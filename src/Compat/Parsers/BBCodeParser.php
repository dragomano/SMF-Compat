<?php declare(strict_types=1);

namespace Bugo\Compat\Parsers;

use Bugo\Compat\Parser;

use function parse_bbc;

class BBCodeParser extends Parser
{
	private static array $parsers;

	public static function load(bool $for_print = false): object
	{
		if (! isset(self::$parsers[(int) $for_print])) {
			self::$parsers[(int) $for_print] = new self();
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
