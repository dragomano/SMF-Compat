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

if (! function_exists('getTodayInfo')) {
	function getTodayInfo(): array
	{
		return [];
	}
}

if (! function_exists('getCalendarList')) {
	function getCalendarList(string $start_date, string $end_date, array $calendarOptions): array
	{
		return [$start_date, $end_date, $calendarOptions];
	}
}

if (! function_exists('getCalendarGrid')) {
	function getCalendarGrid(
		string $selected_date,
		array $calendarOptions,
		bool $is_previous = false,
		bool $has_picker = true
	): array
	{
		return [$selected_date, $calendarOptions, $is_previous, $has_picker];
	}
}
