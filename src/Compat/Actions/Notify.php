<?php declare(strict_types=1);

/**
 * Notify.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat\Actions;

use Bugo\Compat\Config;

use function getNotifyPrefs;

class Notify
{
	public static function getNotifyPrefs(
		int|array $members,
		string|array $prefs = '',
		bool $process_default = false
	): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Notify.php';

		return getNotifyPrefs($members, $prefs, $process_default);
	}
}
