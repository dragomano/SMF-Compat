<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use Exception;
use stdClass;

use function allowedTo;
use function boardsAllowedTo;
use function checkSession;
use function isAllowedTo;
use function loadMemberContext;
use function membersAllowedTo;
use function updateMemberData;

class User extends stdClass
{
	public const LOAD_BY_ID = 0;

	public const LOAD_BY_NAME = 1;

	public const LOAD_BY_EMAIL = 2;

	public array $formatted = [];

	public static self $me;

	public static array $loaded = [];

	public static array $profiles;

	private bool $custom_fields_displayed = false;

	public function __construct(?int $id = null)
	{
		if (! isset($GLOBALS['user_profile'])) {
			$GLOBALS['user_profile'] = [];
		}

		self::$profiles = &$GLOBALS['user_profile'];

		if ($id) {
			$this->id = $id;
			self::$loaded[$id] = $this;
		}

		if (! isset(self::$me)) {
			self::$me = $this;
		}
	}

	public function __get(string $key): mixed
	{
		return $GLOBALS['user_info'][$key] ?? null;
	}

	public function allowedTo(string|array $permission): bool
	{
		return allowedTo($permission);
	}

	public function boardsAllowedTo(
		string|array $permissions,
		bool $check_access = true,
		bool $simple = true
	): array
	{
		return boardsAllowedTo($permissions, $check_access, $simple);
	}

	public function checkSession(
		string $type = 'post',
		string $from_action = '',
		bool $is_fatal = true
	): string
	{
		return checkSession($type, $from_action, $is_fatal);
	}

	public function isAllowedTo(
		string|array $permission,
		int|array|null $boards = null,
		bool $any = false
	): bool
	{
		return isAllowedTo($permission, $boards, $any);
	}

	/**
	 * @throws Exception
	 */
	public function format(bool $display_custom_fields = false): array
	{
		if (empty(Config::$modSettings['displayFields'])) {
			$display_custom_fields = false;
		}

		if (! empty($this->formatted) && $this->custom_fields_displayed >= $display_custom_fields) {
			return $this->formatted;
		}

		$this->formatted = (array) loadMemberContext($this->id, $display_custom_fields);

		$this->custom_fields_displayed = ! empty($this->custom_fields_displayed) || $display_custom_fields;

		return $this->formatted;
	}

	public static function getAllowedTo(string $permission, ?int $board_id = null): array
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Members.php';

		return membersAllowedTo($permission, $board_id);
	}

	public static function updateMemberData(array $members, array $data): void
	{
		updateMemberData($members, $data);
	}

	public static function load(
		array|string|int $users = [],
		int $type = self::LOAD_BY_ID,
		?string $dataset = null
	): array
	{
		$users = (array) $users;

		$loaded = [];

		if ($users === []) {
			$loaded[] = new self();
		} else {
			$dataset ??= 'normal';

			$ids = self::loadUserData($users, $type, $dataset);

			foreach ($ids as $id) {
				if (! isset(self::$loaded[$id])) {
					new self($id);
				}

				$loaded[] = self::$loaded[$id];
			}
		}

		return $loaded;
	}

	protected static function loadUserData(array $users, int $type = self::LOAD_BY_ID, string $set = 'normal'): array
	{
		return loadMemberData($users, (bool) $type, $set);
	}
}
