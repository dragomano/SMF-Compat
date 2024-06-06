<?php declare(strict_types=1);

/**
 * ScheduledTask.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat\Tasks;

use Bugo\Compat\Config;
use Bugo\Compat\Db;

use function time;

abstract class ScheduledTask extends BackgroundTask
{
	/**
	 * @codeCoverageIgnore
	 */
	public static function updateNextTaskTime(): void
	{

		$result = Db::$db->query('', '
			SELECT next_time
			FROM {db_prefix}scheduled_tasks
			WHERE disabled = {int:not_disabled}
			ORDER BY next_time ASC
			LIMIT 1',
			[
				'not_disabled' => 0,
			],
		);

		if (Db::$db->num_rows($result) === 0) {
			$nextTaskTime = time() + 86400;
		} else {
			[$nextTaskTime] = Db::$db->fetch_row($result);
		}

		Db::$db->free_result($result);

		Config::updateModSettings(['next_task_time' => $nextTaskTime]);
	}
}
