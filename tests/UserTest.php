<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\User;
use Exception;

/**
 * @requires PHP 8.0
 */
class UserTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new User();
	}

	/**
	 * @covers User::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsArray(User::$info);
		$this->assertIsArray(User::$profiles);
		$this->assertIsArray(User::$settings);
		$this->assertIsArray(User::$memberContext);
		$this->assertInstanceOf(User::class, User::$me);
	}

	/**
	 * @covers User::hasPermission
	 */
	public function testHasPermission()
	{
		$this->assertTrue(User::hasPermission('foo_bar'));
		$this->assertFalse(User::hasPermission('foo'));
	}

	/**
	 * @covers User::$me->checkSession
	 */
	public function testCheckSession()
	{
		$this->assertEmpty(User::$me->checkSession());
	}

	/**
	 * @covers User::mustHavePermission
	 */
	public function testMustHavePermission()
	{
		$this->assertTrue(User::mustHavePermission('foo_bar'));
		$this->assertFalse(User::mustHavePermission('foo'));
	}

	/**
	 * @covers User::loadMemberData
	 */
	public function testLoadMemberData()
	{
		$this->assertIsArray(User::loadMemberData(['foo_bar']));
	}

	/**
	 * @covers User::loadMemberContext
	 * @throws Exception
	 */
	public function testLoadMemberContext()
	{
		$this->assertTrue(User::loadMemberContext(1));
	}

	/**
	 * @covers User::membersAllowedTo
	 */
	public function testMembersAllowedTo()
	{
		$this->assertSame(['foo_bar'], User::membersAllowedTo('foo_bar'));
	}

	/**
	 * @covers User::updateMemberData
	 */
	public function testUpdateMemberData()
	{
		try {
			User::updateMemberData([1], ['foo' => 'bar']);
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}