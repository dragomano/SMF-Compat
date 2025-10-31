<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use stdClass;

use function addInlineCss;
use function addInlineJavaScript;
use function addJavaScriptVar;
use function loadCSSFile;
use function loadEssentialThemeData;
use function loadJavaScriptFile;
use function loadTemplate;
use function setupThemeContext;

class Theme
{
	public static stdClass $current;

	public function __construct()
	{
		self::$current = new stdClass();

		if (! isset($GLOBALS['settings'])) {
			$GLOBALS['settings'] = [];
		}

		self::$current->settings = &$GLOBALS['settings'];

		if (! isset($GLOBALS['options'])) {
			$GLOBALS['options'] = [];
		}

		self::$current->options = &$GLOBALS['options'];
	}

	public static function addJavaScriptVar(string $key, string $value, bool $escape = false): void
	{
		addJavaScriptVar($key, $value, $escape);
	}

	public static function addInlineCss(string $css): bool
	{
		$result = addInlineCss($css);

		return is_bool($result) ? $result : true;
	}

	public static function addInlineJavaScript(string $javascript, bool $defer = false): bool
	{
		$result = addInlineJavaScript($javascript, $defer);

		return is_bool($result) ? $result : true;
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
		if (isset(self::$current->settings['default_theme_dir']))
			return;

		RequireHelper::requireFile('ScheduledTasks.php');

		loadEssentialThemeData();
	}

	public static function loadTemplate(string $template, array|string $style_sheets = [], bool $fatal = true): ?bool
	{
		return loadTemplate($template, $style_sheets, $fatal);
	}

	public static function setupContext(bool $forceload = false): void
	{
		setupThemeContext($forceload);
	}
}
