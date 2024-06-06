<?php declare(strict_types=1);

/**
 * Security.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function checkSubmitOnce;

class Security
{
	public static function checkSubmitOnce(string $action): ?bool
	{
		return checkSubmitOnce($action) ?? null;
	}
}
