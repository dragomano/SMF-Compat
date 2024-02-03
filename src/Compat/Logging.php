<?php declare(strict_types=1);

/**
 * Logging.php
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

use function logAction;

class Logging
{
	public static function logAction(string $action, array $extra = []): int
	{
		return logAction($action, $extra);
	}
}
