<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Notify;

/**
 * @requires PHP 8.0
 */
class NotifyTest extends AbstractBase
{
	/**
	 * @covers Notify::getNotifyPrefs
	 */
	public function testGetNotifyPrefs()
	{
		$this->assertIsArray(Notify::getNotifyPrefs(1));
	}
}