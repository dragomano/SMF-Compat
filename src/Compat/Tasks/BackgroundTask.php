<?php declare(strict_types=1);

namespace Bugo\Compat\Tasks;

use SMF_BackgroundTask;

abstract class BackgroundTask extends SMF_BackgroundTask
{
	abstract public function execute(): bool;
}
