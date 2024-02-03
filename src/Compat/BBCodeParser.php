<?php declare(strict_types=1);

/**
 * BBCodeParser.php
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

use function parse_bbc;

class BBCodeParser
{
	private static object $parser;

	public static function load(): object
	{
		if (! isset(self::$parser)) {
			self::$parser = new self();
		}

		return self::$parser;
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
