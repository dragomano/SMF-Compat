<?php declare(strict_types=1);

namespace Bugo\Compat\Graphics;

use Bugo\Compat\RequireHelper;
use Bugo\Compat\Sapi;

use function createThumbnail;

class Image
{
	public string $source;

	public function __construct(string $source)
	{
		if (is_file($source)) {
			$this->source = realpath($source);
		} else {
			$this->source = tempnam(Sapi::getTempDir(), '');
		}
	}

	public function createThumbnail(int $max_width, int $max_height): bool
	{
		RequireHelper::requireFile('Subs-Graphics.php');

		return createThumbnail($this->source, $max_width, $max_height);
	}
}
