<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
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

	public static function stringFromUnix(int|string|null $timestamp = null): string
	{
		return timeformat($timestamp);
	}
}
