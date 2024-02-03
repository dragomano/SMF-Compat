# SMF Compat

![SMF 2.1](https://img.shields.io/badge/SMF-2.1-ed6033.svg?style=flat)
![PHP](https://img.shields.io/badge/PHP-^8.0-blue.svg?style=flat)

## Description

The package is designed to prepare current SMF 2.1 modifications for the future migration to 3.0.

The proposed utility classes eliminate the need to declare global variables in your modification code.

As a result, your modifications will be able to work in both SMF branches, with minimal changes.

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

### Old code

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

Or use class aliases in `app.php` (or other similar _entry point_) of your application:

```php
<?php

if (str_starts_with(SMF_VERSION, '3.0')) {
    class_alias('SMF\\Lang', 'Bugo\\Compat\\Lang');
    class_alias('SMF\\User', 'Bugo\\Compat\\User');
    class_alias('SMF\\Config', 'Bugo\\Compat\\Config');
}
```

In this case, your modification will be able to support both versions of SMF.

---

## Описание

Пакет предназначен для подготовки текущих модификаций SMF 2.1 к будущей миграции на 3.0.

Предлагаемые утилитарные классы позволяют избавиться от необходимости объявлять глобальные переменные в коде ваших модификаций.

В результате ваши модификации смогут работать в обеих линейках SMF, с минимальными изменениями.

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
        echo Lang::$txt['hello_world'];
    }

    public function method2()
    {
        echo User::$info['name'];

        var_dump(Config::$modSettings);
    }
}
```

После перехода на SMF 3.0 достаточно будет заменить используемые классы:

```diff
-use Bugo\Compat\Lang;
+use SMF\Lang;
-use Bugo\Compat\User;
+use SMF\User;
-use Bugo\Compat\Config;
+use SMF\Config;
```

Или использовать алиасы в `app.php` (или в другой аналогичной _точке входа_) вашего приложения:

```php
<?php

if (str_starts_with(SMF_VERSION, '3.0')) {
    class_alias('SMF\\Lang', 'Bugo\\Compat\\Lang');
    class_alias('SMF\\User', 'Bugo\\Compat\\User');
    class_alias('SMF\\Config', 'Bugo\\Compat\\Config');
}
```

В этом случае ваша модификация сможет поддерживать обе версии SMF.
