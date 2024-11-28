<?php declare(strict_types=1);

/**
 * Time.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function smf_strftime;
use function timeformat;

class Time
{
	public static function strftime(string $format, ?int $timestamp = null, ?string $tzid = null): string
	{
		return smf_strftime($format, $timestamp, $tzid);
	}

	public static function timeformat(
		int|string $log_time,
		bool|string $show_today = true,
		?string $tzid = null
	): string
	{
		return timeformat($log_time, $show_today, $tzid);
	}
}
