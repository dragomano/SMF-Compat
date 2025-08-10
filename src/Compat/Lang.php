<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use IntlException;
use MessageFormatter;

use function censorText;
use function comma_format;
use function getLanguages;
use function is_array;
use function is_string;
use function loadLanguage;
use function sentence_list;
use function tokenTxtReplace;

class Lang
{
	public const LANG_TO_LOCALE = [];

	public static string $default;

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
		if (! isset(self::$default)) {
			self::$default = &Config::$language;
		}

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

	public static function load(string $filename, string $lang = ''): void
	{
		if ($filename === 'General') {
			$filename = 'index';
		}

		loadLanguage($filename, $lang);
	}

	public static function txtExists(
		string|array $txt_key,
		string $var = 'txt',
		?string $file = null
	): bool
	{
		if (is_string($file)) {
			self::load($file);
		}

		return isset(self::${$var}[$txt_key]);
	}

	public static function setTxt(
		string|array $txt_key,
		string|array $value,
		string $var = 'txt'
	): void
	{
		if (is_string($txt_key)) {
			self::${$var}[$txt_key] = $value;

			return;
		}

		$count = count($txt_key);

		if ($count === 0)
			return;

		$ref = &self::${$var};
		foreach ($txt_key as $i => $segment) {
			if ($i === $count - 1) {
				$ref[$segment] = $value;
			} else {
				if (! isset($ref[$segment]) || ! is_array($ref[$segment])) {
					$ref[$segment] = [];
				}

				$ref = &$ref[$segment];
			}
		}
	}

	public static function getTxt(
		string|array $key,
		array $args = [],
		string $var = 'txt',
		?string $file = null,
		string $lang = ''
	): string|array
	{
		if (is_string($file)) {
			self::load($file, $lang);
		}

		if ($args === [] && is_string($key)) {
			return self::${$var}[$key] ?? '';
		}

		if (is_array($key)) {
			if (isset($key[0], $key[1])) {
				$pattern = self::${$var}[$key[0]][$key[1]] ?? '';

				return self::format($pattern, $args, "\${$var}[$key[0]][$key[1]]");
			}

			return '';
		}

		$pattern = self::${$var}[$key] ?? $key;

		return self::format($pattern, $args, "\${$var}[$key]");
	}

	public static function tokenTxtReplace(string $string = ''): string
	{
		return tokenTxtReplace($string);
	}

	public static function sentenceList(array $list): string
	{
		return sentence_list($list);
	}

	public static function numberFormat(int|float|string $number, ?int $decimals = null): string
	{
		return comma_format($number, $decimals);
	}

	private static function format(string $pattern, array $args, string $context): string
	{
		try {
			$formatter = new MessageFormatter(self::$txt['lang_locale'] ?? 'en_US', $pattern);
			return $formatter->format($args);
		} catch (IntlException $e) {
			ErrorHandler::log("Lang::getTxt: {$e->getMessage()} in '$context'", 'critical');
			return '';
		}
	}
}
