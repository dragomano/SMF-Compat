<?php

use Bugo\Compat\Utils;

if (! function_exists('loadEssentialThemeData')) {
	function loadEssentialThemeData(): void
	{
		Utils::$context['theme_loaded'] = true;
	}
}
