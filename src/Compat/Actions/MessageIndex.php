<?php declare(strict_types=1);

namespace Bugo\Compat\Actions;

use Bugo\Compat\RequireHelper;

use function getBoardList;

class MessageIndex
{
	public static function getBoardList(array $boardListOptions = []): array
	{
		RequireHelper::requireFile('Subs-MessageIndex.php');

		return getBoardList($boardListOptions);
	}
}
