<?php declare(strict_types=1);

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
