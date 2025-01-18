<?php

if (! function_exists('removeMessage')) {
	function removeMessage(int $message, bool $decreasePostCount = true): bool
	{
		return !!$message;
	}
}
