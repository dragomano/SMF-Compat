<?php declare(strict_types=1);

/**
 * Lang.php
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

use IntlException;
use MessageFormatter;
use function censorText;
use function getLanguages;
use function loadLanguage;
use function sentence_list;

class Lang
{
	public const LANG_TO_LOCALE = [];

	public static array $txt;

	public static array $editortxt;

	public static array $helptxt;

	public static string $forum_copyright;

	private array $vars = [
		'txt'             => [],
		'editortxt'       => [],
		'helptxt'         => [],
		'forum_copyright' => '',
	];

	public function __construct()
	{
		foreach ($this->vars as $key => $value) {
			if (! isset($GLOBALS[$key])) {
				$GLOBALS[$key] = $value;
			}

			self::${$key} = &$GLOBALS[$key];
		}
	}

	public static function censorText(string &$text): void
	{
		censorText($text);
	}

	public static function get(): array
	{
		return getLanguages();
	}

	public static function load(string $language, string $lang = ''): void
	{
		loadLanguage($language, $lang);
	}

	public static function sentenceList(array $list): string
	{
		return sentence_list($list);
	}

	public static function getTxt(string|array $txt_key, array $args = [], string $var = 'txt'): string
	{
		if (is_array($txt_key)) {
			$txt_key = (string) key($txt_key);
		}

		if ($args === [] && is_string($txt_key)) {
			return self::${$var}[$txt_key] ?? '';
		}

		if (! extension_loaded('intl')) {
			ErrorHandler::log('Lang::getTxt: You should enable the intl extension in php.ini', 'critical');

			return '';
		}

		$message = self::${$var}[$txt_key] ?? $key;

		try {
			$formatter = new MessageFormatter(self::$txt['lang_locale'] ?? 'en_US', $message);

			return $formatter->format($args);
		} catch (IntlException $e) {
			ErrorHandler::log("Lang::getTxt: {$e->getMessage()} in '\${$var}[$txt_key]'", 'critical');

			return '';
		}
	}
}
