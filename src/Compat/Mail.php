<?php declare(strict_types=1);

namespace Bugo\Compat;

use Bugo\Compat\RequireHelper;
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
		RequireHelper::requireFile('Subs-Post.php');

		return loadEmailTemplate($template, $replacements, $lang, $load_custom);
	}

	public static function send(
		array|string $to,
		string $subject,
		string $message,
		?string $from = null,
		?string $message_id = null,
		bool $send_html = false,
		int $priority = 3,
		?bool $hotmail_fix = null,
		bool $is_private = false
	): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

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
