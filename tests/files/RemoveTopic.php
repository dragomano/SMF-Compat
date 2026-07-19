<?php

if (! function_exists('removeMessage')) {
	function removeMessage(int $message, bool $decreasePostCount = true)
	{
		return $message;
	}
}

if (! function_exists('removeTopics')) {
	function removeTopics(array|int $topics, bool $decreasePostCount = true)
	{
	}
}
