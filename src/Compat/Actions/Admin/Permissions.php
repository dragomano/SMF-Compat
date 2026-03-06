<?php declare(strict_types=1);

namespace Bugo\Compat\Actions\Admin;

use Bugo\Compat\RequireHelper;
use Bugo\Compat\Theme;

use function theme_inline_permissions;

class Permissions
{
	public static array $permission_groups = [
		'global' => [
			'general',
			'pm',
			'calendar',
			'maintenance',
			'member_admin',
			'profile',
			'profile_account',
			'likes',
			'mentions',
			'bbc',
		],
		'board' => [
			'general_board',
			'topic',
			'post',
			'poll',
			'attachment',
		],
	];

	public static array $left_permission_groups = [
		'general',
		'calendar',
		'maintenance',
		'member_admin',
		'topic',
		'post',
	];

	public static function theme_inline_permissions(string $permission): void
	{
		Theme::loadTemplate('ManagePermissions');

		RequireHelper::requireFile('ManagePermissions.php');

		theme_inline_permissions($permission);
	}
}
