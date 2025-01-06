<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function createList;

class ItemList
{
	public function __construct(array $listOptions)
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-List.php';

		createList($listOptions);
	}
}
