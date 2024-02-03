<?php declare(strict_types=1);

/**
 * Topic.php
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

class Topic
{
	public static int $id;

	public function __construct()
	{
		if (! isset($GLOBALS['topic'])) {
			$GLOBALS['topic'] = 0;
		}

		self::$id = &$GLOBALS['topic'];
	}
}
