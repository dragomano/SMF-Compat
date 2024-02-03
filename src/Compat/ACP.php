<?php declare(strict_types=1);

/**
 * ACP.php
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

use function prepareDBSettingContext;
use function saveDBSettings;

class ACP
{
	public static function saveDBSettings(array &$vars): void
	{
		saveDBSettings($vars);
	}

	public static function prepareDBSettingContext(array &$vars): void
	{
		prepareDBSettingContext($vars);
	}
}
