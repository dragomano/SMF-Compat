<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Mail;
use ErrorException;

/**
 * @requires PHP 8.0
 */
class MailTest extends AbstractBase
{
	/**
	 * @covers Mail::loadEmailTemplate
	 */
	public function testLoadEmailTemplate()
	{
		$this->assertIsArray(Mail::loadEmailTemplate('foo_bar'));
	}

	/**
	 * @covers Mail::send
	 */
	public function testSend()
	{
		try {
			Mail::send(['test@test.com'], 'foo', 'bar');
			$result = 'success';
		} catch (ErrorException $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}