<?php

if (! function_exists('sm_temp_dir')) {
	function sm_temp_dir(): string
	{
		return '';
	}
}

if (! function_exists('updateSettingsFile')) {
	function updateSettingsFile(...$args): bool
	{
		return true;
	}
}

if (! function_exists('safe_file_write')) {
	function safe_file_write(...$args): bool
	{
		return true;
	}
}
