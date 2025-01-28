<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\WebFetch;

use Bugo\Compat\Url;

use function fetch_web_data;

abstract class WebFetchApi
{
    public static function fetch(Url|string $url, string|array $post_data = [], bool $keep_alive = false): string|false
	{
		return fetch_web_data($url, $post_data, $keep_alive);
	}
}
