<?php declare(strict_types=1);

namespace Bugo\Compat;

use function smf_strftime;

class Time
{
	public static function strftime(string $format, ?int $timestamp = null, ?string $tzid = null): string
	{
		return smf_strftime($format, $timestamp, $tzid) ?: '';
	}

	public static function stringFromUnix(int|string|null $timestamp = null): string|false
	{
		return timeformat($timestamp);
	}
}
