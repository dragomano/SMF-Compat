<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Graphics;

use Bugo\Compat\Config;

class Image
{
	public static function makeThumbnail(string $source, int $max_width, int $max_height): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Graphics.php';

		return createThumbnail($source, $max_width, $max_height);
	}
}
