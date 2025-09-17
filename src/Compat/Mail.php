<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use ErrorException;

use function loadEmailTemplate;
use function sendmail;

class Mail
{
	public static function loadEmailTemplate(
		string $template,
		array $replacements = [],
		string $lang = '',
		bool $load_custom = true
	): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return loadEmailTemplate($template, $replacements, $lang, $load_custom);
	}

	public static function send(
		array|string $to,
		string $subject,
		string $message,
		string $from = null,
		string $message_id = null,
		bool $send_html = false,
		int $priority = 3,
		?bool $hotmail_fix = null,
		bool $is_private = false
	): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		try {
			return (bool) sendmail(
				$to,
				$subject,
				$message,
				$from,
				$message_id,
				$send_html,
				$priority,
				$hotmail_fix,
				$is_private
			);
		} catch (ErrorException) {}

		return false;
	}
}
