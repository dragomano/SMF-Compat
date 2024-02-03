<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\IntegrationHook;

/**
 * @requires PHP 8.0
 */
class IntegrationHookTest extends AbstractBase
{
	/**
	 * @covers IntegrationHook::call
	 */
	public function testCall()
	{
		$this->assertIsArray(IntegrationHook::call('foo_bar'));
	}

	/**
	 * @covers IntegrationHook::add
	 */
	public function testAdd()
	{
		try {
			IntegrationHook::add('foo_bar', self::class);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}