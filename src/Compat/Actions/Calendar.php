<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Actions;

use BadMethodCallException;
use Bugo\Compat\Config;

use function function_exists;

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
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Calendar.php';

		if (function_exists($name)) {
			return $name(...$arguments);
		}

		throw new BadMethodCallException(__CLASS__ . ": method `$name` does not exist.");
	}
}
