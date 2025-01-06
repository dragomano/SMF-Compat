<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

class Menu
{
	public array $tab_data = [];

	public static array $loaded = [];

	public function __construct()
	{
		$action = Utils::$context['current_action'] ?? '';

		self::$loaded[$action] = $this;

		$menu = Utils::$context['admin_menu_name'] ?? '';

		$this->tab_data = &Utils::$context[$menu]['tab_data'];
	}
}
