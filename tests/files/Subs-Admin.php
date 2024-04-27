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
