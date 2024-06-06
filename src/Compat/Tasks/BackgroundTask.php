<?php declare(strict_types=1);

/**
 * BackgroundTask.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat\Tasks;

use SMF_BackgroundTask;

abstract class BackgroundTask extends SMF_BackgroundTask
{
	abstract public function execute(): bool;
}
