<?php declare(strict_types=1);

/**
 * Permissions.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat\Actions;

use Bugo\Compat\Config;
use Bugo\Compat\Theme;

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

		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'ManagePermissions.php';

		theme_inline_permissions($permission);
	}
}
