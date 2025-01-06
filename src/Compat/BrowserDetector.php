<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

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
