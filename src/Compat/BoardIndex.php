<?php declare(strict_types=1);

/**
 * BoardIndex.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat;

use function BoardIndex;

class BoardIndex
{
	public static function call(): void
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'BoardIndex.php';

		BoardIndex();
	}
}
