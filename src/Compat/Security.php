<?php declare(strict_types=1);

namespace Bugo\Compat;

use function checkSubmitOnce;

class Security
{
	public static function checkSubmitOnce(string $action): bool
	{
		return (bool) checkSubmitOnce($action);
	}
}
