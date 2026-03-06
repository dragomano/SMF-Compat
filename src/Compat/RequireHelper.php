<?php declare(strict_types=1);

namespace Bugo\Compat;

class RequireHelper
{
	public static function requireFile(string $file): void
	{
		$file = Config::$sourcedir . DIRECTORY_SEPARATOR . $file;

		if (file_exists($file)) {
			require_once($file);
		}
	}
}
