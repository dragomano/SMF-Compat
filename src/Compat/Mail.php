<?php declare(strict_types=1);

/**
 * Mail.php
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

use ErrorException;

use function loadEmailTemplate;
use function sendmail;

class Mail
{
	public static function loadEmailTemplate(
		string $template,
		array $replacements = [],
		string $lang = '',
		bool $loadLang = true
	): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return loadEmailTemplate($template, $replacements, $lang, $loadLang);
	}

	/**
	 * @throws ErrorException
	 */
	public static function send(
		array $to,
		string $subject,
		string $message,
		string $from = null,
		string $message_id = null,
		bool $send_html = false,
		int $priority = 3
	): void
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		sendmail($to, $subject, $message, $from, $message_id, $send_html, $priority);
	}
}
