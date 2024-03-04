<?php declare(strict_types=1);

/**
 * Theme.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat;

use stdClass;
use function addJavaScriptVar;
use function addInlineCss;
use function addInlineJavaScript;
use function loadCSSFile;
use function loadJavaScriptFile;
use function loadEssentialThemeData;
use function loadTemplate;

class Theme
{
	public static stdClass $current;

	public function __construct()
	{
		self::$current = new stdClass();

		if (! isset($GLOBALS['settings']))
			$GLOBALS['settings'] = [];

		self::$current->settings = &$GLOBALS['settings'];

		if (! isset($GLOBALS['options']))
			$GLOBALS['options'] = [];

		self::$current->options = &$GLOBALS['options'];
	}

	public static function load(): void
	{
		Utils::$context['current_action'] = isset($_REQUEST['action']) ? Utils::htmlspecialchars($_REQUEST['action']) : null;
		Utils::$context['current_subaction'] = $_REQUEST['sa'] ?? null;
	}

	public static function addJavaScriptVar(string $key, string $value, bool $escape = false): void
	{
		addJavaScriptVar($key, $value, $escape);
	}

	public static function addInlineCss(string $css): void
	{
		addInlineCss($css);
	}

	public static function addInlineJavaScript(string $javascript, $defer = false): void
	{
		addInlineJavaScript($javascript, $defer);
	}

	public static function loadCSSFile(string $fileName, array $params = [], string $id = ''): void
	{
		loadCSSFile($fileName, $params, $id);
	}

	public static function loadJavaScriptFile(string $fileName, array $params = [], string $id = ''): void
	{
		loadJavaScriptFile($fileName, $params, $id);
	}

	public static function loadEssential(): void
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'ScheduledTasks.php';

		loadEssentialThemeData();
	}

	public static function loadTemplate(string $template): void
	{
		loadTemplate($template);
	}
}
