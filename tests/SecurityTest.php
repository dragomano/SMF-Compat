<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Security;

/**
 * @requires PHP 8.0
 */
class SecurityTest extends AbstractBase
{
	/**
	 * @covers Security::checkSubmitOnce
	 */
	public function testCheckSubmitOnce()
	{
		$this->assertTrue(Security::checkSubmitOnce('register'));
	}
}