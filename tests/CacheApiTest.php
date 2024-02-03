<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\CacheApi;
use Bugo\Compat\Utils;

/**
 * @requires PHP 8.0
 */
class CacheApiTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		Utils::$context['tmp'] = [];
	}

	/**
	 * @covers CacheApi::get
	 */
	public function testGet()
	{
		$this->assertNull(CacheApi::get('foo'));
	}

	/**
	 * @covers CacheApi::put
	 */
	public function testPut()
	{
		CacheApi::put('foo', 'bar');

		$this->assertSame('bar', Utils::$context['tmp']['foo']);
	}

	/**
	 * @covers CacheApi::clean
	 */
	public function testClean()
	{
		CacheApi::clean();

		$this->assertEmpty(Utils::$context['tmp']);
	}
}