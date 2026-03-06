<?php declare(strict_types=1);

namespace Bugo\Compat\Actions;

use BadMethodCallException;
use Bugo\Compat\RequireHelper;

/**
 * @method static array getBirthdayRange(string $low_date, string $high_date)
 * @method static array getEventRange(string $low_date, string $high_date, bool $use_permissions = true)
 * @method static array getHolidayRange(string $low_date, string $high_date)
 * @method static array getTodayInfo()
 * @method static array getCalendarList(string $start_date, string $end_date, array $calendarOptions)
 * @method static array getCalendarGrid(string $selected_date, array $calendarOptions, bool $is_previous = false, bool $has_picker = true)
 */
class Calendar
{
	public static function __callStatic(string $name, array $arguments)
	{
		RequireHelper::requireFile('Subs-Calendar.php');

		if (function_exists($name)) {
			return $name(...$arguments);
		}

		throw new BadMethodCallException(self::class . ": method `$name` does not exist.");
	}
}
