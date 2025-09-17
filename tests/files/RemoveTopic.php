<?php

if (! function_exists('removeMessage')) {
	function removeMessage(int $message, bool $decreasePostCount = true)
	{
		return $message;
	}
}

if (! function_exists('removeTopic')) {
	function removeTopic(int $topic, bool $decreasePostCount = true)
	{
		return $topic;
	}
}
