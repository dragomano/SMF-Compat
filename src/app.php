<?php declare(strict_types=1);

if (! defined('SMF_VERSION'))
	return;

use Bugo\Compat\{BBCodeParser, Board, CacheApi, Config, Db, Editor};
use Bugo\Compat\{ErrorHandler, IntegrationHook, ItemList, Lang, Logging};
use Bugo\Compat\{Mail, Menu, Msg, PageIndex, Sapi, Security, ServerSideIncludes};
use Bugo\Compat\{Theme, Topic, User, Utils, WebFetchApi};
use Bugo\Compat\Actions\{ACP, BoardIndex, Calendar, MessageIndex, Notify, Permissions};
use Bugo\Compat\Tasks\{BackgroundTask, GenericTask, ScheduledTask};

if (str_starts_with(SMF_VERSION, '3.0')) {
	$aliases = [
		'SMF\\Actions\\Admin\\ACP'         => ACP::class,
		'SMF\\Actions\\Admin\\Permissions' => Permissions::class,
		'SMF\\Actions\\BoardIndex'         => BoardIndex::class,
		'SMF\\Actions\\Calendar'           => Calendar::class,
		'SMF\\Actions\\MessageIndex'       => MessageIndex::class,
		'SMF\\Actions\\Notify'             => Notify::class,
		'SMF\\BBCodeParser'                => BBCodeParser::class,
		'SMF\\Board'                       => Board::class,
		'SMF\\Cache\\CacheApi'             => CacheApi::class,
		'SMF\\Config'                      => Config::class,
		'SMF\\Db\\DatabaseApi'             => Db::class,
		'SMF\\Editor'                      => Editor::class,
		'SMF\\ErrorHandler'                => ErrorHandler::class,
		'SMF\\IntegrationHook'             => IntegrationHook::class,
		'SMF\\ItemList'                    => ItemList::class,
		'SMF\\Lang'                        => Lang::class,
		'SMF\\Logging'                     => Logging::class,
		'SMF\\Mail'                        => Mail::class,
		'SMF\\Menu'                        => Menu::class,
		'SMF\\Msg'                         => Msg::class,
		'SMF\\PageIndex'                   => PageIndex::class,
		'SMF\\Sapi'                        => Sapi::class,
		'SMF\\Security'                    => Security::class,
		'SMF\\ServerSideIncludes'          => ServerSideIncludes::class,
		'SMF\\Tasks\\BackgroundTask'       => BackgroundTask::class,
		'SMF\\Tasks\\GenericTask'          => GenericTask::class,
		'SMF\\Tasks\\ScheduledTask'        => ScheduledTask::class,
		'SMF\\Theme'                       => Theme::class,
		'SMF\\Topic'                       => Topic::class,
		'SMF\\User'                        => User::class,
		'SMF\\Utils'                       => Utils::class,
		'SMF\\WebFetch\\WebFetchApi'       => WebFetchApi::class,
	];

	$applyAlias = static fn($class, $alias) => class_alias($class, $alias);

	array_map($applyAlias, array_keys($aliases), $aliases);

	return;
}

array_map(fn($u) => new $u(), [
	Db::class,
	Lang::class,
	User::class,
	Theme::class,
	Board::class,
	Topic::class,
	Utils::class,
	Config::class,
]);
