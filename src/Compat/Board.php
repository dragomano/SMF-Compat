<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use stdClass;

class Board extends stdClass
{
	public static ?int $id;

	public static ?array $info;

	public static array $loaded;

	private array $vars = [
		'id'     => ['board', 0],
		'info'   => ['board_info', []],
		'loaded' => ['boards', []],
	];

	public function __construct(?int $id = null, array $props = [])
	{
		if ($id !== null) {
			$GLOBALS['board'] = $id;
		}

		foreach ($props as $key => $value) {
			if ($key === 'info') {
				$GLOBALS['board_info'] = $value;
			}
		}

		foreach ($this->vars as $key => $values) {
			if (! isset($GLOBALS[$values[0]])) {
				$GLOBALS[$values[0]] = $values[1];
			}

			self::${$key} = &$GLOBALS[$values[0]];
		}
	}
}
