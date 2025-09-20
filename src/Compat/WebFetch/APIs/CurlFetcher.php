<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\WebFetch\APIs;

use Bugo\Compat\RequireHelper;
use Bugo\Compat\Url;
use Bugo\Compat\WebFetch\WebFetchApi;
use curl_fetch_web_data;

class CurlFetcher extends WebFetchApi
{
	private curl_fetch_web_data $data;

	public function __construct(array $options = [])
	{
		RequireHelper::requireFile('Class-CurlFetchWeb.php');

		$this->data = new curl_fetch_web_data($options);
	}

	public function request(string|Url $url, array|string $post_data = []): object
	{
		return $this->data->get_url_data($url, $post_data);
	}
}
