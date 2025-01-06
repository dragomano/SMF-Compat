<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Actions;

use Bugo\Compat\Config;

use function getBoardList;

class MessageIndex
{
	public static function getBoardList(array $boardListOptions = []): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-MessageIndex.php';

		return getBoardList($boardListOptions);
	}
}
