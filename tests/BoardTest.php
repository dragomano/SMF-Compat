<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Board;

/**
 * @requires PHP 8.0
 */
class BoardTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Board();
	}

	/**
	 * @covers Board::__construct
	 */
	public function testConstructor()
	{
		$this->assertSame(0, Board::$id);
		$this->assertIsArray(Board::$info);
		$this->assertIsArray(Board::$loaded);
	}
}