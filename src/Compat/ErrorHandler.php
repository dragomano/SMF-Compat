<?php declare(strict_types=1);

/**
 * ErrorHandler.php
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

use function fatal_error;
use function fatal_lang_error;
use function log_error;

class ErrorHandler
{
	public static function fatal(string $message): void
	{
		fatal_error($message, false);
	}

	public static function fatalLang(
		string $error,
		string|bool $log = 'general',
		array $sprintf = [],
		int $status = 403
	): void
	{
		fatal_lang_error($error, false, null, $status);
	}

	public static function log(string $message, string $level = 'user'): string
	{
		return log_error($message, $level);
	}
}
