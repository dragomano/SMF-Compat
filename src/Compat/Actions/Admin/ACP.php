<?php declare(strict_types=1);

namespace Bugo\Compat\Actions\Admin;

use Bugo\Compat\RequireHelper;

use function prepareDBSettingContext;
use function saveDBSettings;

class ACP
{
	public static function saveDBSettings(array &$vars): void
	{
		RequireHelper::requireFile('ManageServer.php');

		saveDBSettings($vars);
	}

	public static function prepareDBSettingContext(array &$vars): void
	{
		RequireHelper::requireFile('ManageServer.php');

		prepareDBSettingContext($vars);
	}
}
