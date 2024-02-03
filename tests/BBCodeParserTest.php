<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\BBCodeParser;

/**
 * @requires PHP 8.0
 */
class BBCodeParserTest extends AbstractBase
{
	/**
	 * @covers BBCodeParser::load
	 */
	public function testLoad()
	{
		$this->assertSame(BBCodeParser::load(), BBCodeParser::load());
	}

	/**
	 * @covers BBCodeParser::parse
	 */
	public function testParse()
	{
		$this->assertIsString(BBCodeParser::load()->parse('foo'));
	}
}