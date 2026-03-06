<?php declare(strict_types=1);

namespace Bugo\Compat\Graphics;

use Bugo\Compat\RequireHelper;

use function createThumbnail;

class Image
{
	public static function createThumbnail(string $source, int $max_width, int $max_height): bool
	{
		RequireHelper::requireFile('Subs-Graphics.php');

		return createThumbnail($source, $max_width, $max_height);
	}
}
