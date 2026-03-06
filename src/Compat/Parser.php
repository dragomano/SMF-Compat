<?php declare(strict_types=1);

namespace Bugo\Compat;

use function preparsecode;
use function un_preparsecode;

abstract class Parser
{
	public static function sanitize(string $message, bool $previewing = false, bool $autolink = false): string
	{
		RequireHelper::requireFile('Subs-Post.php');

		preparsecode($message, $previewing);

		return $message;
	}

	public static function getEditableString(string $message): string
	{
		RequireHelper::requireFile('Subs-Post.php');

		return un_preparsecode($message);
	}
}
