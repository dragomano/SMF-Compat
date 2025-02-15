<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

class QueryString
{
	public static array $route_parsers = [];

	public static function rewriteAsQueryless(string $buffer): string
	{
		return $buffer;
	}
}
