<?php declare(strict_types=1);

/**
 * Attachment.php
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

use function createAttachment;
use function removeAttachments;

class Attachment
{
	public static function create(array &$attachmentOptions): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Attachments.php';

		return createAttachment($attachmentOptions);
	}

	public static function remove(array $condition, string $query_type = '', bool $return_affected_messages = false, bool $autoThumbRemoval = true): ?array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'ManageAttachments.php';

		return removeAttachments($condition, $query_type, $return_affected_messages, $autoThumbRemoval);
	}
}
