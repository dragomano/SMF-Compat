<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Lang;

/**
 * @requires PHP 8.0
 */
class LangTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Lang();
	}

	/**
	 * @covers Lang::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsArray(Lang::$txt);
		$this->assertIsArray(Lang::$editortxt);
	}

	/**
	 * @covers Lang::censorText
	 */
	public function testCensorText()
	{
		$source = 'foo';

		Lang::censorText($source);

		$this->assertSame('changed', $source);
	}

	/**
	 * @covers Lang::get
	 */
	public function testGet()
	{
		$this->assertIsArray(Lang::get());
	}

	/**
	 * @covers Lang::load
	 */
	public function testLoad()
	{
		Lang::load('bar');

		$this->assertSame('bar', Lang::$txt['foo']);
	}

	/**
	 * @covers Lang::sentenceList
	 */
	public function testSentenceList()
	{
		$this->assertIsString(Lang::sentenceList(['foo', 'bar']));
	}
}