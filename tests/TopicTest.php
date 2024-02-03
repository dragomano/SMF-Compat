<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Topic;

/**
 * @requires PHP 8.0
 */
class TopicTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Topic();
	}

	/**
	 * @covers Topic::__construct
	 */
	public function testConstructor()
	{
		$this->assertSame(0, Topic::$id);
	}
}