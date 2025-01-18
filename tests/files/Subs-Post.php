<?php

if (! function_exists('loadEmailTemplate')) {
	function loadEmailTemplate(...$params): array
	{
		return $params;
	}
}

if (! function_exists('sendmail')) {
	function sendmail(...$params): void
	{
	}
}

if (! function_exists('createPost')) {
	function createPost(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		return !!$posterOptions['id'];
	}
}

if (! function_exists('modifyPost')) {
	function modifyPost(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		return !!$msgOptions['id'];
	}
}

if (! function_exists('approvePosts')) {
	function approvePosts(array|int $msgs, bool $approve = true, bool $notify = true): bool
	{
		return $msgs && $approve;
	}
}
