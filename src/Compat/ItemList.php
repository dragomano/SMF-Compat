<?php declare(strict_types=1);

namespace Bugo\Compat;

use function createList;

class ItemList
{
	public function __construct(array $listOptions)
	{
		RequireHelper::requireFile('Subs-List.php');

		createList($listOptions);
	}
}
