<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use Bugo\Compat\RequireHelper;

use function createAttachment;
use function removeAttachments;

class Attachment
{
	public static function create(array &$attachmentOptions): bool
	{
		RequireHelper::requireFile('Subs-Attachments.php');

		return createAttachment($attachmentOptions);
	}

	public static function remove(
		array $condition,
		string $query_type = '',
		bool $return_affected_messages = false,
		bool $autoThumbRemoval = true
	): ?array
	{
		RequireHelper::requireFile('ManageAttachments.php');

		return removeAttachments($condition, $query_type, $return_affected_messages, $autoThumbRemoval);
	}
}
