# SMF Compat

![SMF 2.1](https://img.shields.io/badge/SMF-2.1-ed6033.svg?style=flat)
![PHP](https://img.shields.io/badge/PHP-^8.0-blue.svg?style=flat)
![Coverage](https://badgen.net/coveralls/c/github/dragomano/smf-compat/main)

[English](README.md)

## Описание

Пакет предназначен для подготовки текущих модификаций SMF 2.1 к будущей миграции на 3.0.

Предлагаемые утилитарные классы позволяют избавиться от необходимости объявлять глобальные переменные в коде ваших модификаций.

В результате ваши модификации смогут работать как в SMF 2.1, так и в 3.0, с минимальными изменениями.

## Установка

В корневой директории вашей модификации выполните команду:

```bash
composer require bugo/smf-compat
```

Затем в `app.php` (или в другой аналогичной _точке входа_) подключите `autoload.php`:

```php
require_once __DIR__ . '/vendor/autoload.php';
```

## Использование

### Старый код

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

### Новый код

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

После перехода на SMF 3.0 достаточно будет заменить используемые классы. Например:

```diff
-use Bugo\Compat\Lang;
+use SMF\Lang;
-use Bugo\Compat\User;
+use SMF\User;
-use Bugo\Compat\Config;
+use SMF\Config;
-use Bugo\Compat\Db;
+use SMF\Db\DatabaseApi as Db;
// и т. д.
```

Или можно оставить как есть. В этом случае ваша модификация будет поддерживать обе версии SMF.

## Список предлагаемых замен

Ниже перечислены некоторые (не все) изменения переменных и функций.

### Глобальные переменные

| Старый код (SMF 2.1.x) |     Новый код (SMF 3.0)     |
| ---------------------- | :-------------------------: |
| `$board`               |        `Board::$id`         |
| `$boards`              |      `Board::$loaded`       |
| `board_info`           |       `Board::$info`        |
| `$modSettings`         |   `Config::$modSettings`    |
| `$mbname`              |      `Config::$mbname`      |
| `$scripturl`           |    `Config::$scripturl`     |
| `$boardurl`            |     `Config::$boardurl`     |
| `$boarddir`            |     `Config::$boarddir`     |
| `$sourcedir`           |    `Config::$sourcedir`     |
| `$cachedir`            |     `Config::$cachedir`     |
| `$db_server`           |    `Config::$db_server`     |
| `$db_name`             |     `Config::$db_name`      |
| `$db_user`             |     `Config::$db_user`      |
| `$db_passwd`           |    `Config::$db_passwd`     |
| `$db_type`             |     `Config::$db_type`      |
| `$db_prefix`           |    `Config::$db_prefix`     |
| `$language`            |     `Config::$language`     |
| `$cache_enable`        |   `Config::$cache_enable`   |
| `$db_show_debug`       |  `Config::$db_show_debug`   |
| `$db_count`            |        `Db::$count`         |
| `$db_cache`            |        `Db::$cache`         |
| `$txt`                 |        `Lang::$txt`         |
| `$editortxt`           |     `Lang::$editortxt`      |
| `$helptxt`             |      `Lang::$helptxt`       |
| `$forum_copyright`     |  `Lang::$forum_copyright`   |
| `$settings`            | `Theme::$current->settings` |
| `$options`             | `Theme::$current->options`  |
| `$topic`               |        `Topic::$id`         |
| `$user_info`           |        `User::$info`        |
| `$user_profile`        |      `User::$profiles`      |
| `$user_settings`       |      `User::$settings`      |
| `$memberContext`       |   `User::$memberContext`    |
| `$context`             |      `Utils::$context`      |
| `$smcFunc`             |      `Utils::$smcFunc`      |

### Функции

| Старый код (SMF 2.1.x)     |       Новый код (SMF 3.0)       |
| -------------------------- | :-----------------------------: |
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
| `preparsecode`             |       `Msg::preparseCode`       |
| `un_preparsecode`          |     `Msg::un_preparsecode`      |
| `getNotifyPrefs`           |    `Notify::getNotifyPrefs`     |
| `constructPageIndex`       |         `new PageIndex`         |
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
| `membersAllowedTo`         |    `User::membersAllowedTo`     |
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
| `fetch_web_data`           |       `WebFetchApi:fetch`       |
| `timeformat`               |     `Time::stringFromUnix`      |

#### SSI-функции

Все функции, находящиеся в SSI.php, которые до 3.0 вызывались через `ssi_имя_функции`, в 3.0 вызываются так: `ServerSideIncludes::имя_функции`.

#### Работа с базой данных

В режиме совместимости можно использовать `Utils::$smcFunc['db_query']` и т. д., но также введён новый класс `DatabaseApi`, со статическим свойством `$db`, содержащим класс текущего движка базы данных.
Методы этого класса аналогичны функциям в `Utils::$smcFunc`, но без приставки `db_`.
Покажем на примере трёх популярных функций:

|                 Старый код (SMF 2.1.x)                  |                Новый код (SMF 3.0)                |
| :-----------------------------------------------------: | :-----------------------------------------------: |
|                   `global $smcFunc;`                    |      `use Bugo\Compat\Db\DatabaseApi as Db;`      |
| `$result = $smcFunc['db_query']('', /* Ваш SQL */, [])` | `$result = Db::$db->query('', /* Ваш SQL */, [])` |
|      `$rows = $smcFunc['db_fetch_assoc']($result)`      |      `$rows = Db::$db->fetch_assoc($result)`      |
|          `$smcFunc['db_free_result']($result)`          |          `Db::$db->free_result($result)`          |

## Примеры использования данной библиотеки

- [Optimus 3.0](https://github.com/dragomano/Optimus)
- [SMF Tracy Debugger](https://github.com/dragomano/SMF-Tracy-Debugger)
- [Light Portal](https://github.com/dragomano/Light-Portal)
