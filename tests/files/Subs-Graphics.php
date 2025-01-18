<?php

if (! function_exists('createThumbnail')) {
	function createThumbnail(string $source, int $max_width, int $max_height): bool
	{
		return !!$source;
	}
}
