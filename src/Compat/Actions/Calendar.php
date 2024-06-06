<?php declare(strict_types=1);

/**
 * Calendar.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat\Actions;

use Bugo\Compat\Config;

use function getBirthdayRange;
use function getCalendarGrid;
use function getCalendarList;
use function getEventRange;
use function getHolidayRange;
use function getTodayInfo;

class Calendar
{
	public static function getBirthdayRange(string $low_date, string $high_date): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getBirthdayRange($low_date, $high_date);
	}

	public static function getEventRange(string $low_date, string $high_date, bool $use_permissions = true): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getEventRange($low_date, $high_date, $use_permissions);
	}

	public static function getHolidayRange(string $low_date, string $high_date): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getHolidayRange($low_date, $high_date);
	}

	public static function getTodayInfo(): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getTodayInfo();
	}

	public static function getCalendarList(string $start_date, string $end_date, array $calendarOptions): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getCalendarList($start_date, $end_date, $calendarOptions);
	}

	public static function getCalendarGrid(
		string $selected_date,
		array $calendarOptions,
		bool $is_previous = false,
		bool $has_picker = true
	): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		return getCalendarGrid($selected_date, $calendarOptions, $is_previous, $has_picker);
	}
}
