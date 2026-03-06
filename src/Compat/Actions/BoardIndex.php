<?php declare(strict_types=1);

namespace Bugo\Compat\Actions;

use Bugo\Compat\RequireHelper;

use function BoardIndex;

class BoardIndex
{
	public static function call(): void
	{
		RequireHelper::requireFile('BoardIndex.php');

		BoardIndex();
	}
}
