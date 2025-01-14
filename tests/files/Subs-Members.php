<?php

if (! function_exists('membersAllowedTo')) {
	function membersAllowedTo(string $permission, ?int $board_id = null): array
	{
		return [$permission, $board_id];
	}
}
