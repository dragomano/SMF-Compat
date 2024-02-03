<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Msg;

/**
 * @requires PHP 8.0
 */
class MsgTest extends AbstractBase
{
	/**
	 * @covers Msg::preparseCode
	 */
	public function testPreparseCode()
	{
		$source = 'foo';

		Msg::preparseCode($source);

		$this->assertSame('changed', $source);
	}

	/**
	 * @covers Msg::unPreparseCode
	 */
	public function testUnPreparseCode()
	{
		$this->assertSame('foo', Msg::unPreparseCode('foo'));
	}
}