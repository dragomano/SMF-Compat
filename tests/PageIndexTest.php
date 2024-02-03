<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\PageIndex;

/**
 * @requires PHP 8.0
 */
class PageIndexTest extends AbstractBase
{
	public int $start = 0;

	/**
	 * @covers PageIndex::__construct
	 */
	public function testConstructor()
	{
		try {
			new PageIndex('https://foo.bar', $this->start, 10, 5);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers PageIndex::__toString
	 */
	public function testStringable()
	{
		$index = new PageIndex('https://foo.bar', $this->start, 10, 5);

		$this->assertIsString((string) $index);
	}
}