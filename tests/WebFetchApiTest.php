<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\WebFetchApi;

/**
 * @requires PHP 8.0
 */
class WebFetchApiTest extends AbstractBase
{
	/**
	 * @covers WebFetchApi::fetch
	 */
	public function testFetch()
	{
		$this->assertTrue(WebFetchApi::fetch('https://foo.bar'));
	}
}