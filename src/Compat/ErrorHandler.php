<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function display_db_error;
use function fatal_error;
use function fatal_lang_error;
use function log_error;

class ErrorHandler
{
	public static function fatal(string $error, string|bool $log = 'general', int $status = 500): void
	{
		fatal_error($error, $log, $status);
	}

	public static function fatalLang(
		string $error,
		string|bool $log = 'general',
		array $sprintf = [],
		int $status = 403,
		string $file = 'Errors'
	): void
	{
		if ($file !== 'Errors') {
			Lang::load($file);
		}

		fatal_lang_error($error, $log, $sprintf, $status);
	}

	public static function log(
		string $error_message,
		string|bool $error_type = 'general',
		string $file = '',
		int $line = 0,
		?array $backtrace = null
	): string
	{
		return log_error($error_message, $error_type, $file, $line, $backtrace);
	}

	public static function displayDbError(): void
	{
		display_db_error();
	}
}
