<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Actions;

use Bugo\Compat\RequireHelper;

use function getBoardList;

class MessageIndex
{
	public static function getBoardList(array $boardListOptions = []): array
	{
		RequireHelper::requireFile('Subs-MessageIndex.php');

		return getBoardList($boardListOptions);
	}
}
