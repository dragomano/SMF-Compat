<?php declare(strict_types=1);

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
