<?php

if (! function_exists('saveDBSettings')) {
	function saveDBSettings(array &$vars): void
	{
		$vars[key($vars)] = 'changed';
	}
}

if (! function_exists('prepareDBSettingContext')) {
	function prepareDBSettingContext(array &$vars): void
	{
		$vars[key($vars)] = 'changed';
	}
}
