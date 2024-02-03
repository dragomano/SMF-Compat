<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\ErrorHandler;
use Bugo\Compat\Utils;

/**
 * @requires PHP 8.0
 */
class ErrorHandlerTest extends AbstractBase
{
	/**
	 * @covers ErrorHandler::fatal
	 */
	public function testFatal()
	{
		ErrorHandler::fatal('foo');

		$this->assertSame('foo', Utils::$context['error_title']);
	}

	/**
	 * @covers ErrorHandler::fatalLang
	 */
	public function testFatalLang()
	{
		ErrorHandler::fatalLang('bar');

		$this->assertSame('bar', Utils::$context['error_title']);
	}

	/**
	 * @covers ErrorHandler::log
	 */
	public function testLog()
	{
		$this->assertIsString(ErrorHandler::log('test'));
	}
}