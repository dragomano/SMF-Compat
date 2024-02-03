<?php

if (! function_exists('membersAllowedTo')) {
	function membersAllowedTo(string $permission): array
	{
		return [$permission];
	}
}
