<?php declare(strict_types=1);

/**
 * WebFetchApi.php
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

use function fetch_web_data;

class WebFetchApi
{
	public static function fetch(string $url): bool|string
	{
		return fetch_web_data($url);
	}
}
