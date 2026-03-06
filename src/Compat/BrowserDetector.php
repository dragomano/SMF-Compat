<?php declare(strict_types=1);

namespace Bugo\Compat;

use function detectBrowser;
use function isBrowser;

class BrowserDetector
{
	public static function call(): void
	{
		detectBrowser();
	}

	public static function isBrowser(string $browser): bool
	{
		return isBrowser($browser);
	}
}
