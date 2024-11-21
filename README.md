# SMF Compat

![SMF 2.1](https://img.shields.io/badge/SMF-2.1-ed6033.svg?style=flat)
![PHP](https://img.shields.io/badge/PHP-^8.0-blue.svg?style=flat)
![Coverage](https://badgen.net/coveralls/c/github/dragomano/smf-compat/main)

[По-русски](README.ru.md)

## Description

The package is designed to prepare current SMF 2.1 modifications for the future migration to 3.0.

The proposed utility classes eliminate the need to declare global variables in your modification code.

As a result, your modifications will be able to work in both SMF 2.1 and 3.0, with minimal changes.

## Installation

In the root directory of your modification, run the command:

```bash
composer require bugo/smf-compat
```

Then in `app.php` (or other similar _entry point_), inlcude `autoload.php`:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

## Usage

### Legacy code

```php
<?php

class Example
{
    public function method1()
    {
        global $txt;

        echo $txt['hello_world'];
    }

    public function method2()
    {
        global $user_info, $modSettings;

        echo $user_info['name'];

        var_dump($modSettings);
    }
}
```

### New code

```php
<?php

use Bugo\Compat\Lang;
use Bugo\Compat\User;
use Bugo\Compat\Config;

class Example
{
    public function method1()
    {
        echo Lang::$txt['hello_world'];
    }

    public function method2()
    {
        echo User::$info['name'];

        var_dump(Config::$modSettings);
    }
}
```

After upgrading to SMF 3.0, it will be enough to replace the used classes:

```diff
-use Bugo\Compat\Lang;
+use SMF\Lang;
-use Bugo\Compat\User;
+use SMF\User;
-use Bugo\Compat\Config;
+use SMF\Config;
```

Or you can leave it as it is. In this case, your modification will support both versions of SMF.

## List of suggested replacements

### Global variables

| Legacy code (SMF 2.1.x) |     New code (SMF 3.0)      |
| ----------------------- | :-------------------------: |
| `$board`                |        `Board::$id`         |
| `$boards`               |      `Board::$loaded`       |
| `board_info`            |       `Board::$info`        |
| `$modSettings`          |   `Config::$modSettings`    |
| `$mbname`               |      `Config::$mbname`      |
| `$scripturl`            |    `Config::$scripturl`     |
| `$boardurl`             |     `Config::$boardurl`     |
| `$boarddir`             |     `Config::$boarddir`     |
| `$sourcedir`            |    `Config::$sourcedir`     |
| `$cachedir`             |     `Config::$cachedir`     |
| `$db_server`            |    `Config::$db_server`     |
| `$db_name`              |     `Config::$db_name`      |
| `$db_user`              |     `Config::$db_user`      |
| `$db_passwd`            |    `Config::$db_passwd`     |
| `$db_type`              |     `Config::$db_type`      |
| `$db_prefix`            |    `Config::$db_prefix`     |
| `$language`             |     `Config::$language`     |
| `$cache_enable`         |   `Config::$cache_enable`   |
| `$db_show_debug`        |  `Config::$db_show_debug`   |
| `$db_count`             |        `Db::$count`         |
| `$db_cache`             |        `Db::$cache`         |
| `$txt`                  |        `Lang::$txt`         |
| `$editortxt`            |     `Lang::$editortxt`      |
| `$helptxt`              |      `Lang::$helptxt`       |
| `$forum_copyright`      |  `Lang::$forum_copyright`   |
| `$settings`             | `Theme::$current->settings` |
| `$options`              | `Theme::$current->options`  |
| `$topic`                |        `Topic::$id`         |
| `$user_info`            |        `User::$info`        |
| `$user_profile`         |      `User::$profiles`      |
| `$user_settings`        |      `User::$settings`      |
| `$memberContext`        |   `User::$memberContext`    |
| `$context`              |      `Utils::$context`      |
| `$smcFunc`              |      `Utils::$smcFunc`      |

### Functions

| Legacy code (SMF 2.1.x)    |                   New code (SMF 3.0)                   |
| -------------------------- | :----------------------------------------------------: |
| `saveDBSettings`           |                 `ACP::saveDBSettings`                  |
| `prepareDBSettingContext`  |             `ACP::prepareDBSettingContext`             |
| `createAttachment`         |                  `Attachment::create`                  |
| `removeAttachments`        |                  `Attachment::remove`                  |
| `parse_bbc`                |             `BBCodeParser::load()->parse`              |
| `BoardIndex`               |                  `BoardIndex::call()`                  |
| `cache_get_data`           |                    `CacheApi::get`                     |
| `cache_put_data`           |                    `CacheApi::put`                     |
| `clean_cache`              |                   `CacheApi::clean`                    |
| `getBirthdayRange`         |              `Calendar::getBirthdayRange`              |
| `getEventRange`            |               `Calendar::getEventRange`                |
| `getHolidayRange`          |              `Calendar::getHolidayRange`               |
| `getTodayInfo`             |                `Calendar::getTodayInfo`                |
| `getCalendarList`          |              `Calendar::getCalendarList`               |
| `getCalendarGrid`          |              `Calendar::getCalendarGrid`               |
| `updateSettings`           |              `Config::updateModSettings`               |
| `updateSettingsFile`       |              `Config::updateSettingsFile`              |
| `db_extend`                |                      `Db::extend`                      |
| `create_control_richedit`  |                      `new Editor`                      |
| `fatal_error`              |                 `ErrorHandler::fatal`                  |
| `fatal_lang_error`         |               `ErrorHandler::fatalLang`                |
| `log_error`                |                  `ErrorHandler::log`                   |
| `add_integration_function` |                 `IntegrationHook::add`                 |
| `call_integration_hook`    |                `IntegrationHook::call`                 |
| `createList`               |                     `new ItemList`                     |
| `censorText`               |                   `Lang::censorText`                   |
| `getLanguages`             |                      `Lang::get`                       |
| `loadLanguage`             |                      `Lang::load`                      |
| `sentence_list`            |                  `Lang::sentenceList`                  |
| `tokenTxtReplace`          |                `Lang::tokenTxtReplace`                 |
| `logAction`                |                  `Logging::logAction`                  |
| `loadEmailTemplate`        |               `Mail::loadEmailTemplate`                |
| `sendmail`                 |                      `Mail::send`                      |
| `getBoardList`             |              `MessageIndex::getBoardList`              |
| `preparsecode`             |                  `Msg::preparseCode`                   |
| `un_preparsecode`          |                 `Msg::un_preparsecode`                 |
| `getNotifyPrefs`           |                `Notify::getNotifyPrefs`                |
| `constructPageIndex`       |                    `new PageIndex`                     |
| `memoryReturnBytes`        |               `Sapi::memoryReturnBytes`                |
| `sm_temp_dir`              |                   `Sapi::getTempDir`                   |
| `set_time_limit`           |                  `Sapi::setTimeLimit`                  |
| `checkSubmitOnce`          |              `Security::checkSubmitOnce`               |
| `addJavaScriptVar`         |               `Theme::addJavaScriptVar`                |
| `addInlineCss`             |                 `Theme::addInlineCss`                  |
| `addInlineJavaScript`      |              `Theme::addInlineJavaScript`              |
| `loadCSSFile`              |                  `Theme::loadCSSFile`                  |
| `loadJavaScriptFile`       |              `Theme::loadJavaScriptFile`               |
| `loadEssentialThemeData`   |                 `Theme::loadEssential`                 |
| `loadTemplate`             |                 `Theme::loadTemplate`                  |
| `allowedTo`                |    `User::$me->allowedTo` or `User::hasPermission`     |
| `checkSession`             |   `User::$me->checkSession` or `User::sessionCheck`    |
| `isAllowedTo`              | `User::$me->isAllowedTo` or `User::mustHavePermission` |
| `loadMemberData`           |                 `User::loadMemberData`                 |
| `loadMemberContext`        |               `User::loadMemberContext`                |
| `membersAllowedTo`         |                `User::membersAllowedTo`                |
| `updateMemberData`         |                `User::updateMemberData`                |
| `JavaScriptEscape`         |               `Utils::escapeJavaScript`                |
| `obExit`                   |                    `Utils::obExit`                     |
| `redirectexit`             |                 `Utils::redirectexit`                  |
| `send_http_status`         |                `Utils::sendHttpStatus`                 |
| `shorten_subject`          |                    `Utils::shorten`                    |
| `smf_chmod`                |                 `Utils::makeWritable`                  |
| `smf_json_decode`          |                  `Utils::jsonDecode`                   |
| `get_mime_type`            |                  `Utils::getMimeType`                  |
| `un_htmlspecialchars`      |            `Utils::htmlspecialcharsDecode`             |
| `fetch_web_data`           |                  `WebFetchApi::fetch`                  |
| `timeformat`               |                   `Time::timeformat`                   |

#### SSI functions

All functions in SSI.php that were called via `ssi_function_name` before 3.0 are called this way in 3.0: `ServerSideIncludes::function_name`.

#### Working with the database

In compatibility mode, you can use `Utils::$smcFunc['db_query']`, etc., but also introduced a new class `Db`, with a static property `$db` containing the class of the current database engine. The methods of this class are similar to functions in `Utils::$smcFunc`, but without the `db_` prefix. Let's show on the example of three popular functions:

|                 Legacy code (SMF 2.1.x)                  |                 New code (SMF 3.0)                 |
| :------------------------------------------------------: | :------------------------------------------------: |
|                    `global $smcFunc;`                    |               `use Bugo\Compat\Db;`                |
| `$result = $smcFunc['db_query']('', /* Your SQL */, [])` | `$result = Db::$db->query('', /* Your SQL */, [])` |
|      `$rows = $smcFunc['db_fetch_assoc']($result)`       |      `$rows = Db::$db->fetch_assoc($result)`       |
|          `$smcFunc['db_free_result']($result)`           |          `Db::$db->free_result($result)`           |

## Examples of using this library

- [Optimus 3.0](https://github.com/dragomano/Optimus)
- [SMF Tracy Debugger](https://github.com/dragomano/SMF-Tracy-Debugger)
- [Light Portal](https://github.com/dragomano/Light-Portal)
