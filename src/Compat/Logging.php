<?php declare(strict_types=1);

namespace Bugo\Compat;

use function logAction;

class Logging
{
	public static function logAction(string $action, array $extra = []): int
	{
		return logAction($action, $extra);
	}
}
