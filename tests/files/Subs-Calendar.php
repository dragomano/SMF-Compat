<?php

if (! function_exists('getBirthdayRange')) {
	function getBirthdayRange(string $low_date, string $high_date): array
	{
		return [$low_date => $high_date];
	}
}

if (! function_exists('getEventRange')) {
	function getEventRange(string $low_date, string $high_date, bool $use_permissions = true): array
	{
		return [$low_date => $high_date];
	}
}

if (! function_exists('getHolidayRange')) {
	function getHolidayRange(string $low_date, string $high_date): array
	{
		return [$low_date => $high_date];
	}
}
