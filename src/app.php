<?php declare(strict_types=1);

if (! defined('SMF_VERSION'))
	return;

use Bugo\Compat\{Attachment, Board, BrowserDetector, Config, Db};
use Bugo\Compat\{Editor, ErrorHandler, IntegrationHook, ItemList};
use Bugo\Compat\{Lang, Logging, Mail, Menu, Msg, PageIndex};
use Bugo\Compat\{QueryString, Sapi, Security, ServerSideIncludes};
use Bugo\Compat\{Theme, Time, Topic, Url, User, Utils};
use Bugo\Compat\Actions\{BoardIndex, Calendar, MessageIndex, Notify};
use Bugo\Compat\Actions\Admin\{ACP, Permissions};
use Bugo\Compat\Cache\CacheApi;
use Bugo\Compat\Db\DatabaseApi;
use Bugo\Compat\Graphics\Image;
use Bugo\Compat\Parsers\BBCodeParser;
use Bugo\Compat\Tasks\{BackgroundTask, GenericTask, ScheduledTask};
use Bugo\Compat\WebFetch\WebFetchApi;

if (str_starts_with(SMF_VERSION, '3.0')) {
	$aliases = [
		'SMF\\Actions\\Admin\\ACP'         => ACP::class,
		'SMF\\Actions\\Admin\\Permissions' => Permissions::class,
		'SMF\\Actions\\BoardIndex'         => BoardIndex::class,
		'SMF\\Actions\\Calendar'           => Calendar::class,
		'SMF\\Actions\\MessageIndex'       => MessageIndex::class,
		'SMF\\Actions\\Notify'             => Notify::class,
		'SMF\\Attachment'                  => Attachment::class,
		'SMF\\Board'                       => Board::class,
		'SMF\\BrowserDetector'             => BrowserDetector::class,
		'SMF\\Cache\\CacheApi'             => CacheApi::class,
		'SMF\\Config'                      => Config::class,
		'SMF\\Db\\DatabaseApi'             => DatabaseApi::class,
		'SMF\\Editor'                      => Editor::class,
		'SMF\\ErrorHandler'                => ErrorHandler::class,
		'SMF\\Graphics\\Image'             => Image::class,
		'SMF\\IntegrationHook'             => IntegrationHook::class,
		'SMF\\ItemList'                    => ItemList::class,
		'SMF\\Lang'                        => Lang::class,
		'SMF\\Logging'                     => Logging::class,
		'SMF\\Mail'                        => Mail::class,
		'SMF\\Menu'                        => Menu::class,
		'SMF\\Msg'                         => Msg::class,
		'SMF\\PageIndex'                   => PageIndex::class,
		'SMF\\Parsers\\BBCodeParser'       => BBCodeParser::class,
		'SMF\\QueryString'                 => QueryString::class,
		'SMF\\Sapi'                        => Sapi::class,
		'SMF\\Security'                    => Security::class,
		'SMF\\ServerSideIncludes'          => ServerSideIncludes::class,
		'SMF\\Tasks\\BackgroundTask'       => BackgroundTask::class,
		'SMF\\Tasks\\GenericTask'          => GenericTask::class,
		'SMF\\Tasks\\ScheduledTask'        => ScheduledTask::class,
		'SMF\\Theme'                       => Theme::class,
		'SMF\\Time'                        => Time::class,
		'SMF\\Topic'                       => Topic::class,
		'SMF\\Url'                         => Url::class,
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
