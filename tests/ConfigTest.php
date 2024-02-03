<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Config;

/**
 * @requires PHP 8.0
 */
class ConfigTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Config();
	}

	/**
	 * @covers Config::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsArray(Config::$modSettings);
		$this->assertIsString(Config::$scripturl);
		$this->assertIsString(Config::$boardurl);
		$this->assertIsString(Config::$boarddir);
		$this->assertIsString(Config::$sourcedir);
		$this->assertIsString(Config::$cachedir);
		$this->assertIsString(Config::$db_type);
		$this->assertIsString(Config::$db_prefix);
		$this->assertIsString(Config::$language);
		$this->assertIsInt(Config::$cache_enable);
		$this->assertIsBool(Config::$db_show_debug);
	}

	/**
	 * @covers Config::updateModSettings
	 */
	public function testUpdateModSettings()
	{
		$this->assertFalse(isset(Config::$modSettings['foo']));

		Config::updateModSettings(['foo' => 'bar']);

		$this->assertSame('bar', Config::$modSettings['foo']);
	}
}