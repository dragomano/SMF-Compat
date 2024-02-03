<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Utils;
use Exception;

/**
 * @requires PHP 8.0
 */
class UtilsTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Utils();
	}

	/**
	 * @covers Utils::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsArray(Utils::$context);
		$this->assertIsArray(Utils::$smcFunc);
	}

	/**
	 * @covers Utils::escapeJavaScript
	 */
	public function testEscapeJavaScript()
	{
		$this->assertIsString(Utils::escapeJavaScript('foo_bar'));
	}

	/**
	 * @covers Utils::obExit
	 */
	public function testObExit()
	{
		try {
			Utils::obExit();
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Utils::redirectexit
	 */
	public function testRedirectexit()
	{
		try {
			Utils::redirectexit();
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Utils::sendHttpStatus
	 */
	public function testSendHttpStatus()
	{
		try {
			Utils::sendHttpStatus(404);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Utils::shorten
	 */
	public function testShorten()
	{
		$this->assertIsString(Utils::shorten('foo'));
	}

	/**
	 * @covers Utils::makeWritable
	 */
	public function testMakeWritable()
	{
		$this->assertTrue(Utils::makeWritable('test.php'));
	}

	/**
	 * @covers Utils::jsonDecode
	 */
	public function testJsonDecode()
	{
		$this->assertIsArray(Utils::jsonDecode('foo'));
	}

	/**
	 * @covers Utils::htmlspecialcharsDecode
	 */
	public function testHtmlspecialcharsDecode()
	{
		$this->assertIsString(Utils::htmlspecialcharsDecode('foo'));
	}
}