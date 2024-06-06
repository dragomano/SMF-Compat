<?php declare(strict_types=1);

/**
 * Utils.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function JavaScriptEscape;
use function json_encode;
use function obExit;
use function redirectexit;
use function send_http_status;
use function shorten_subject;
use function smf_chmod;
use function smf_json_decode;
use function un_htmlspecialchars;

class Utils
{
	public static array $context;

	public static array $smcFunc;

	public function __construct()
	{
		if (! isset($GLOBALS['context'])) {
			$GLOBALS['context'] = [];
		}

		self::$context = &$GLOBALS['context'];

		if (! isset($GLOBALS['smcFunc'])) {
			$GLOBALS['smcFunc'] = [];
		}

		self::$smcFunc = &$GLOBALS['smcFunc'];
	}

	public static function escapeJavaScript(string $string, bool $as_json = false): string
	{
		return JavaScriptEscape($string, $as_json);
	}

	public static function obExit(?bool $header = null): void
	{
		obExit($header);
	}

	public static function redirectexit(string $url = ''): void
	{
		redirectexit($url);
	}

	public static function sendHttpStatus(int $code): void
	{
		send_http_status($code);
	}

	public static function shorten(string $text, int $length = 150): string
	{
		return shorten_subject($text, $length);
	}

	public static function makeWritable(string $file): bool
	{
		return smf_chmod($file);
	}

	public static function jsonDecode(string $json, ?bool $returnAsArray = null): ?array
	{
		return smf_json_decode($json, $returnAsArray) ?: null;
	}

	public static function jsonEncode(mixed $value, int $flags = 0, int $depth = 512): string|false
	{
		return json_encode($value, $flags, $depth);
	}

	public static function htmlspecialchars(string $string, int $flags = ENT_COMPAT, string $encoding = 'UTF-8'): string
	{
		return self::$smcFunc['htmlspecialchars']($string, $flags, $encoding);
	}

	public static function htmlspecialcharsDecode(string $string): string
	{
		return un_htmlspecialchars($string);
	}
}
