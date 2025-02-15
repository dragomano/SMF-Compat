<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use Bugo\Compat\Cache\CacheApi;
use Bugo\Compat\Config;

class Slug
{
	public static function getCached(string $type, int $id): string
	{
		if (empty(Config::$modSettings['cache_enable'])) {
			return '';
		}

		return (string) CacheApi::get('slug_type-' . $type . '_id-' . $id);
	}
}
