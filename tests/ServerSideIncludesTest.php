<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\ServerSideIncludes;

/**
 * @requires PHP 8.0
 */
class ServerSideIncludesTest extends AbstractBase
{
	/**
	 * @covers ServerSideIncludes::__callStatic
	 */
	public function testTopBoards()
	{
		$this->assertIsArray(ServerSideIncludes::topBoards(10, 'array'));
	}

	/**
	 * @covers ServerSideIncludes::__callStatic
	 */
	public function testUnknownFunction()
	{
		$this->assertFalse(ServerSideIncludes::unknownFunction());
	}
}