<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Database;

/**
 * @requires PHP 8.0
 */
class DatabaseTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Database();
	}

	/**
	 * @covers Lang::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsInt(Database::$count);
		$this->assertIsArray(Database::$cache);
	}

	/**
	 * @covers Database::extend
	 */
	public function testExtend()
	{
		try {
			Database::extend();
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}