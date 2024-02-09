<?php declare(strict_types=1);

/**
 * Config.php
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

use function updateSettings;

class Config
{
	public static ?array $modSettings = null;

	public static string $mbname;

	public static string $scripturl;

	public static string $boardurl;

	public static string $boarddir;

	public static string $sourcedir;

	public static string $cachedir;

	public static string $db_server;

	public static string $db_name;

	public static string $db_user;

	public static string $db_passwd;

	public static string $db_type;

	public static string $db_prefix;

	public static string $language;

	public static int $cache_enable;

	public static bool $db_show_debug;

	private array $vars = [
		'modSettings'   => [],
		'mbname'        => '',
		'scripturl'     => '',
		'boardurl'      => '',
		'boarddir'      => '',
		'sourcedir'     => '',
		'cachedir'      => '',
		'db_server'     => '',
		'db_name'       => '',
		'db_user'       => '',
		'db_passwd'     => '',
		'db_type'       => '',
		'db_prefix'     => '',
		'language'      => '',
		'cache_enable'  => 0,
		'db_show_debug' => false,
	];

	public function __construct()
	{
		foreach ($this->vars as $key => $value) {
			if (! isset($GLOBALS[$key])) {
				$GLOBALS[$key] = $value;
			}

			self::${$key} = &$GLOBALS[$key];
		}
	}

	public static function updateModSettings(array $settings): void
	{
		updateSettings($settings);
	}
}
