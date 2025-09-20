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

use function getNotifyPrefs;

class Notify
{
	public static function getNotifyPrefs(
		int|array $members,
		string|array $prefs = '',
		bool $process_default = false
	): array
	{
		RequireHelper::requireFile('Subs-Notify.php');

		return getNotifyPrefs($members, $prefs, $process_default);
	}
}
