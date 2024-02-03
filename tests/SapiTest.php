<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Sapi;
use Exception;

/**
 * @requires PHP 8.0
 */
class SapiTest extends AbstractBase
{
	/**
	 * @covers Sapi::memoryReturnBytes
	 */
	public function testMemoryReturnBytes()
	{
		$this->assertIsInt(Sapi::memoryReturnBytes('256M'));
	}

	/**
	 * @covers Sapi::getTempDir
	 */
	public function testGetTempDir()
	{
		$this->assertIsString(Sapi::getTempDir());
	}

	/**
	 * @covers Sapi::setTimeLimit
	 */
	public function testSetTimeLimit()
	{
		try {
			Sapi::setTimeLimit(100);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}