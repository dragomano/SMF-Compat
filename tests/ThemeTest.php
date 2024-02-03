<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\Theme;
use Bugo\Compat\Utils;
use Exception;
use stdClass;

/**
 * @requires PHP 8.0
 */
class ThemeTest extends AbstractBase
{
	protected function setUp(): void
	{
		parent::setUp();

		new Theme();
	}

	/**
	 * @covers Theme::__construct
	 */
	public function testConstructor()
	{
		$this->assertIsArray(Theme::$current->settings);
		$this->assertIsArray(Theme::$current->options);
		$this->assertInstanceOf(stdClass::class, Theme::$current);
	}

	/**
	 * @covers Theme::addJavaScriptVar
	 */
	public function testAddJavaScriptVar()
	{
		Theme::addJavaScriptVar('foo', 'bar');

		$this->assertSame('bar', Utils::$context['javascript_vars']['foo']);
	}

	/**
	 * @covers Theme::addInlineCss
	 */
	public function testAddInlineCss()
	{
		Theme::addInlineCss('');

		$this->assertEmpty(Utils::$context['css_header']);

		Theme::addInlineCss('foo');

		$this->assertContains('foo', Utils::$context['css_header']);
	}

	/**
	 * @covers Theme::addInlineJavaScript
	 */
	public function testAddInlineJavaScript()
	{
		Theme::addInlineJavaScript('');

		$this->assertEmpty(Utils::$context['javascript_inline']['standard']);

		Theme::addInlineJavaScript('foo', true);

		$this->assertContains('foo', Utils::$context['javascript_inline']['defer']);

		Theme::addInlineJavaScript('bar');

		$this->assertContains('bar', Utils::$context['javascript_inline']['standard']);
	}

	/**
	 * @covers Theme::loadCSSFile
	 */
	public function testLoadCSSFile()
	{
		try {
			Theme::loadCSSFile('test.css');
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Theme::loadJavaScriptFile
	 */
	public function testLoadJavaScriptFile()
	{
		try {
			Theme::loadJavaScriptFile('test.js');
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Theme::loadEssential
	 */
	public function testLoadEssential()
	{
		try {
			Theme::loadEssential();
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}

	/**
	 * @covers Theme::loadTemplate
	 */
	public function testLoadTemplate()
	{
		try {
			Theme::loadTemplate('Test');
			$result = 'success';
		} catch (Exception $e) {
			$result = $e->getMessage();
		}

		$this->assertSame('success', $result);
	}
}