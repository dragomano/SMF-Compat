<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\ACP;

/**
 * @requires PHP 8.0
 */
class ACPTest extends AbstractBase
{
	/**
	 * @covers ACP::saveDBSettings
	 */
	public function testSaveDBSettings()
	{
		$vars = ['foo' => 'bar'];

		ACP::saveDBSettings($vars);

		$this->assertSame('changed', $vars['foo']);
	}

	/**
	 * @covers ACP::prepareDBSettingContext
	 */
	public function testPrepareDBSettingContext()
	{
		$vars = ['foo' => 'bar'];

		ACP::prepareDBSettingContext($vars);

		$this->assertSame('changed', $vars['foo']);
	}
}