<?php

if (! function_exists('loadEmailTemplate')) {
	function loadEmailTemplate(...$params): array
	{
		return [$params];
	}
}

if (! function_exists('sendmail')) {
	function sendmail(...$params): void
	{
	}
}
