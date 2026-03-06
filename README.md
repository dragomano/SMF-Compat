# SMF Compat

![SMF 2.1](https://img.shields.io/badge/SMF-2.1-ed6033.svg?style=flat)
![PHP](https://img.shields.io/badge/PHP-^8.0-blue.svg?style=flat)
![Coverage](https://badgen.net/coveralls/c/github/dragomano/smf-compat/main)

[По-русски](README.ru.md)

## Description

This package is designed to prepare existing SMF 2.1 modifications for the upcoming migration to SMF 3.0.

The included utility classes eliminate the need for global variables in your modification code.

As a result, your mods will be compatible with both SMF 2.1 and 3.0 with minimal adjustments.

## Installation

In your modification's root directory, execute:

```bash
composer require bugo/smf-compat
```

Then, include `autoload.php` in `app.php` (or a similar entry point):

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

        var_dump($txt['hello_world']);
    }

    public function method2()
    {
        global $user_info, $modSettings;

        var_dump($user_info['name']);

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
        var_dump(Lang::$txt['hello_world']);
    }

    public function method2()
    {
        var_dump(User::$me->name);

        var_dump(Config::$modSettings);
    }
}
```

After upgrading to SMF 3.0, you only need to replace the class references. For example:

```diff
-use Bugo\Compat\Lang;
+use SMF\Lang;
-use Bugo\Compat\User;
+use SMF\User;
-use Bugo\Compat\Config;
+use SMF\Config;
-use Bugo\Compat\Db;
+use SMF\Db\DatabaseApi as Db;
// etc.
```

Alternatively, you can leave the code as is. In this case, your modification will maintain compatibility with both SMF versions.

## List of suggested replacements

Below is a non-exhaustive list of variable and function mappings.

### Global variables

| Legacy code (SMF 2.1.x) |     New code (SMF 3.0)      |
|-------------------------|:---------------------------:|
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
| `$user_info`            |         `User::$me`         |
| `$user_profile`         |      `User::$profiles`      |
| `$context`              |      `Utils::$context`      |
| `$smcFunc`              |      `Utils::$smcFunc`      |

### Functions

| Legacy code (SMF 2.1.x)    |       New code (SMF 3.0)        |
|----------------------------|:-------------------------------:|
| `saveDBSettings`           |      `ACP::saveDBSettings`      |
| `prepareDBSettingContext`  | `ACP::prepareDBSettingContext`  |
| `createAttachment`         |      `Attachment::create`       |
| `removeAttachments`        |      `Attachment::remove`       |
| `parse_bbc`                |  `BBCodeParser::load()->parse`  |
| `cache_get_data`           |         `CacheApi::get`         |
| `cache_put_data`           |         `CacheApi::put`         |
| `clean_cache`              |        `CacheApi::clean`        |
| `getBirthdayRange`         |  `Calendar::getBirthdayRange`   |
| `getEventRange`            |    `Calendar::getEventRange`    |
| `getHolidayRange`          |   `Calendar::getHolidayRange`   |
| `getTodayInfo`             |    `Calendar::getTodayInfo`     |
| `getCalendarList`          |   `Calendar::getCalendarList`   |
| `getCalendarGrid`          |   `Calendar::getCalendarGrid`   |
| `updateSettings`           |   `Config::updateModSettings`   |
| `updateSettingsFile`       |  `Config::updateSettingsFile`   |
| `create_control_richedit`  |          `new Editor`           |
| `fatal_error`              |      `ErrorHandler::fatal`      |
| `fatal_lang_error`         |    `ErrorHandler::fatalLang`    |
| `log_error`                |       `ErrorHandler::log`       |
| `add_integration_function` |     `IntegrationHook::add`      |
| `call_integration_hook`    |     `IntegrationHook::call`     |
| `createList`               |         `new ItemList`          |
| `censorText`               |       `Lang::censorText`        |
| `getLanguages`             |           `Lang::get`           |
| `loadLanguage`             |          `Lang::load`           |
| `sentence_list`            |      `Lang::sentenceList`       |
| `tokenTxtReplace`          |     `Lang::tokenTxtReplace`     |
| `logAction`                |      `Logging::logAction`       |
| `loadEmailTemplate`        |    `Mail::loadEmailTemplate`    |
| `sendmail`                 |          `Mail::send`           |
| `getBoardList`             |  `MessageIndex::getBoardList`   |
| `getNotifyPrefs`           |    `Notify::getNotifyPrefs`     |
| `constructPageIndex`       |         `new PageIndex`         |
| `preparsecode`             |       `Parser::sanitize`        |
| `un_preparsecode`          |   `Parser::getEditableString`   |
| `memoryReturnBytes`        |    `Sapi::memoryReturnBytes`    |
| `sm_temp_dir`              |       `Sapi::getTempDir`        |
| `set_time_limit`           |      `Sapi::setTimeLimit`       |
| `checkSubmitOnce`          |   `Security::checkSubmitOnce`   |
| `addJavaScriptVar`         |    `Theme::addJavaScriptVar`    |
| `addInlineCss`             |      `Theme::addInlineCss`      |
| `addInlineJavaScript`      |  `Theme::addInlineJavaScript`   |
| `loadCSSFile`              |      `Theme::loadCSSFile`       |
| `loadJavaScriptFile`       |   `Theme::loadJavaScriptFile`   |
| `loadEssentialThemeData`   |     `Theme::loadEssential`      |
| `loadTemplate`             |      `Theme::loadTemplate`      |
| `allowedTo`                |     `User::$me->allowedTo`      |
| `checkSession`             |    `User::$me->checkSession`    |
| `isAllowedTo`              |    `User::$me->isAllowedTo`     |
| `membersAllowedTo`         |      `User::getAllowedTo`       |
| `updateMemberData`         |    `User::updateMemberData`     |
| `JavaScriptEscape`         |    `Utils::escapeJavaScript`    |
| `obExit`                   |         `Utils::obExit`         |
| `redirectexit`             |      `Utils::redirectexit`      |
| `send_http_status`         |     `Utils::sendHttpStatus`     |
| `shorten_subject`          |        `Utils::shorten`         |
| `smf_chmod`                |      `Utils::makeWritable`      |
| `smf_json_decode`          |       `Utils::jsonDecode`       |
| `get_mime_type`            |      `Utils::getMimeType`       |
| `un_htmlspecialchars`      | `Utils::htmlspecialcharsDecode` |
| `fetch_web_data`           |      `WebFetchApi::fetch`       |
| `timeformat`               |     `Time::stringFromUnix`      |

#### SSI functions

All functions in SSI.php that were called via `ssi_function_name` prior to SMF 3.0 are now accessed as `ServerSideIncludes::function_name`.

#### Working with the database

In compatibility mode, you can still use `Utils::$smcFunc['db_query']`, etc. However, we have also introduced a new `DatabaseApi` class, which features a static property `$db` representing the current database engine.
The methods of this class correspond to the functions in `Utils::$smcFunc`, but without the `db_` prefix.
Here are examples of three commonly used functions:

|                 Legacy code (SMF 2.1.x)                  |                 New code (SMF 3.0)                 |
|:--------------------------------------------------------:|:--------------------------------------------------:|
|                    `global $smcFunc;`                    |      `use Bugo\Compat\Db\DatabaseApi as Db;`       |
| `$result = $smcFunc['db_query']('', /* Your SQL */, [])` | `$result = Db::$db->query('', /* Your SQL */, [])` |
|      `$rows = $smcFunc['db_fetch_assoc']($result)`       |      `$rows = Db::$db->fetch_assoc($result)`       |
|          `$smcFunc['db_free_result']($result)`           |          `Db::$db->free_result($result)`           |

## Examples of Integration

- [Optimus 3.0](https://github.com/dragomano/Optimus)
- [SMF Tracy Debugger](https://github.com/dragomano/SMF-Tracy-Debugger)
- [Light Portal](https://github.com/dragomano/Light-Portal)
