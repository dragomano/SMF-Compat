<?php

if (! function_exists('loadEmailTemplate')) {
	function loadEmailTemplate(...$params): array
	{
		return $params;
	}
}

if (! function_exists('sendmail')) {
	function sendmail(...$params)
	{
		if (empty($params[1])) {
			throw new ErrorException('Empty subject');
		}
	}
}

if (! function_exists('createPost')) {
	function createPost(array &$msgOptions, array &$topicOptions, array &$posterOptions)
	{
		return $posterOptions['id'];
	}
}

if (! function_exists('modifyPost')) {
	function modifyPost(array &$msgOptions, array &$topicOptions, array &$posterOptions)
	{
		return $msgOptions['id'];
	}
}

if (! function_exists('approvePosts')) {
	function approvePosts(array|int $msgs, bool $approve = true, bool $notify = true)
	{
		return $msgs;
	}
}

if (! function_exists('modifyTopic')) {
	function modifyTopic(array &$msgOptions, array &$topicOptions, array &$posterOptions)
	{
		return $msgOptions['id'];
	}
}

if (! function_exists('approveTopics')) {
	function approveTopics(array|int $topics, bool $approve = true, bool $notify = true)
	{
		return $topics;
	}
}
