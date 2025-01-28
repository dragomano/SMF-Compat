<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Cache;

use function cache_get_data;
use function cache_put_data;
use function clean_cache;

class CacheApi
{
	public static function get(string $key, int $ttl = 120): mixed
	{
		return cache_get_data($key, $ttl);
	}

	public static function put(string $key, mixed $value, int $ttl = 120): void
	{
		cache_put_data($key, $value, $ttl);
	}

	public static function clean(): void
	{
		clean_cache();
	}
}
