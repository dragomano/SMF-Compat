<?php /** @noinspection PhpIgnoredClassAliasDeclaration */

declare(strict_types=1);

if (! defined('SMF_VERSION'))
	return;

use Bugo\Compat\{Board, Config, Database, Lang, Theme, Topic, User, Utils};

if (str_starts_with(SMF_VERSION, '3.0')) {
	$aliases = [
		'SMF\\ServerSideIncludes'    => 'Bugo\\Compat\\ServerSideIncludes',
		'SMF\\IntegrationHook'       => 'Bugo\\Compat\\IntegrationHook',
		'SMF\\ErrorHandler'          => 'Bugo\\Compat\\ErrorHandler',
		'SMF\\BBCodeParser'          => 'Bugo\\Compat\\BBCodeParser',
		'SMF\\WebFetch\\WebFetchApi' => 'Bugo\\Compat\\WebFetchApi',
		'SMF\\PageIndex'             => 'Bugo\\Compat\\PageIndex',
		'SMF\\Db\\DatabaseApi'       => 'Bugo\\Compat\\Database',
		'SMF\\Cache\\CacheApi'       => 'Bugo\\Compat\\CacheApi',
		'SMF\\ItemList'              => 'Bugo\\Compat\\ItemList',
		'SMF\\Security'              => 'Bugo\\Compat\\Security',
		'SMF\\Logging'               => 'Bugo\\Compat\\Logging',
		'SMF\\Actions\\Notify'       => 'Bugo\\Compat\\Notify',
		'SMF\\Config'                => 'Bugo\\Compat\\Config',
		'SMF\\Board'                 => 'Bugo\\Compat\\Board',
		'SMF\\Topic'                 => 'Bugo\\Compat\\Topic',
		'SMF\\Theme'                 => 'Bugo\\Compat\\Theme',
		'SMF\\Utils'                 => 'Bugo\\Compat\\Utils',
		'SMF\\Lang'                  => 'Bugo\\Compat\\Lang',
		'SMF\\Mail'                  => 'Bugo\\Compat\\Mail',
		'SMF\\User'                  => 'Bugo\\Compat\\User',
		'SMF\\Sapi'                  => 'Bugo\\Compat\\Sapi',
		'SMF\\Actions\\Admin\\ACP'   => 'Bugo\\Compat\\ACP',
		'SMF\\Msg'                   => 'Bugo\\Compat\\Msg',
	];

	$applyAlias = fn($class, $alias) => class_alias($class, $alias);

	array_map($applyAlias, array_keys($aliases), $aliases);
} else {
	array_map(fn($u) => new $u(), [
		Lang::class,
		User::class,
		Theme::class,
		Board::class,
		Topic::class,
		Utils::class,
		Config::class,
		Database::class,
	]);
}
