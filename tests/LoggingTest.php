<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Logging;

/**
 * @requires PHP 8.0
 */
class LoggingTest extends AbstractBase
{
	/**
	 * @covers Logging::logAction
	 */
	public function testLogAction()
	{
		$this->assertIsInt(Logging::logAction('foo'));
	}
}