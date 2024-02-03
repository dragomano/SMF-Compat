<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\ItemList;

/**
 * @requires PHP 8.0
 */
class ItemListTest extends AbstractBase
{
	/**
	 * @covers ItemList::__construct
	 */
	public function testConstructor()
	{
		try {
			new ItemList([]);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}