<?php declare(strict_types=1);

/**
 * Board.php
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

use stdClass;

class Board extends stdClass
{
	public static int $id;

	public static array $info;

	public static array $loaded;

	public function __construct()
	{
		if (! isset($GLOBALS['board'])) {
			$GLOBALS['board'] = 0;
		}

		self::$id = &$GLOBALS['board'];

		if (! isset($GLOBALS['boards'])) {
			$GLOBALS['boards'] = [];
		}

		self::$loaded = &$GLOBALS['boards'];

		if (! isset($GLOBALS['board_info'])) {
			$GLOBALS['board_info'] = [];
		}

		self::$info = &$GLOBALS['board_info'];
	}
}
