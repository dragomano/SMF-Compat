<?php declare(strict_types=1);

/**
 * User.php
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

use Exception;

use function allowedTo;
use function checkSession;
use function isAllowedTo;
use function loadMemberContext;
use function membersAllowedTo;
use function updateMemberData;

class User
{
	public const LOAD_BY_ID = 0;

	public static self $me;

	public static array $info;

	public static array $profiles;

	public static array $settings;

	public static array $memberContext;

	private array $vars = [
		'info'          => 'user_info',
		'profiles'      => 'user_profile',
		'settings'      => 'user_settings',
		'memberContext' => 'memberContext',
	];

	public function __construct()
	{
		foreach ($this->vars as $key => $value) {
			if (! isset($GLOBALS[$value])) {
				$GLOBALS[$value] = [];
			}

			self::${$key} = &$GLOBALS[$value];
		}

		self::$me = $this;
	}

	public function allowedTo(string $permission): bool
	{
		return allowedTo($permission);
	}

	public function checkSession(string $type = 'post'): string
	{
		return checkSession($type);
	}

	public function isAllowedTo(string|array $permission): void
	{
		isAllowedTo($permission);
	}

	public static function hasPermission(string $permission): bool
	{
		return self::$me->allowedTo($permission);
	}

	public static function sessionCheck(string $type = 'post'): string
	{
		return self::$me->checkSession($type);
	}

	public static function mustHavePermission(string|array $permission): bool
	{
		self::$me->isAllowedTo($permission);

		return true;
	}

	public static function loadMemberData(array $users, int $type = self::LOAD_BY_ID, string $set = 'normal'): array
	{
		return loadMemberData($users, (bool) $type, $set);
	}

	/**
	 * @throws Exception
	 */
	public static function loadMemberContext(int $user, bool $display_custom_fields = false): bool|array
	{
		return loadMemberContext($user, $display_custom_fields);
	}

	public static function membersAllowedTo(string $permission): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Members.php';

		return membersAllowedTo($permission);
	}

	public static function updateMemberData(array $members, array $data): void
	{
		updateMemberData($members, $data);
	}
}
