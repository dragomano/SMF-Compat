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

use function allowedTo;
use function boardsAllowedTo;
use function checkSession;
use function isAllowedTo;
use function loadMemberContext;
use function membersAllowedTo;
use function updateMemberData;

class User extends \stdClass
{
	public const LOAD_BY_ID = 0;

	public int $id;

	public array $formatted = [];

	public static array $loaded = [];

	public static self $me;

	public static array $info;

	public static array $profiles;

	public static array $settings;

	public static array $memberContext;

	private bool $custom_fields_displayed = false;

	private array $vars = [
		'info'          => 'user_info',
		'profiles'      => 'user_profile',
		'settings'      => 'user_settings',
		'memberContext' => 'memberContext',
	];

	public function __construct(?int $id = null)
	{
		foreach ($this->vars as $key => $value) {
			if (! isset($GLOBALS[$value])) {
				$GLOBALS[$value] = [];
			}

			self::${$key} = &$GLOBALS[$value];
		}

		if ($id) {
			$this->id = $id;
			self::$loaded[$id] = $this;
		}

		self::$me = $this;
	}

	public function __get(string $name): mixed
	{
		return $this->$name ?? self::$info[$name] ?? null;
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

	public function checkSession(string $type = 'post', string $from_action = '', bool $is_fatal = true): string
	{
		return checkSession($type, $from_action, $is_fatal);
	}

	public function isAllowedTo(string|array $permission, int|array|null $boards = null, bool $any = false): void
	{
		isAllowedTo($permission, $boards, $any);
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

		$this->formatted = loadMemberContext($this->id, $display_custom_fields);

		$this->custom_fields_displayed = ! empty($this->custom_fields_displayed) || $display_custom_fields;

		return $this->formatted;
	}

	public static function membersAllowedTo(string $permission, ?int $board_id = null): array
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
