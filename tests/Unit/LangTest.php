<?php declare(strict_types=1);

use Bugo\Compat\Lang;

beforeEach(function () {
	$this->lang = new Lang();
});

test('constructor', function () {
	expect($this->lang::$txt)->toBeArray()
		->and($this->lang::$editortxt)->toBeArray();
});

test('censorText method', function () {
	$source = 'foo';

	Lang::censorText($source);

	expect($source)->toBe('changed');
});

test('get method', function () {
	expect($this->lang::get())->toBeArray();
});

test('load method', function () {
	$this->lang::load('bar');

	expect(Lang::$txt['foo'])->toBe('bar');
});

test('sentenceList method', function () {
	expect($this->lang::sentenceList(['foo', 'bar']))->toBeString();
});

test('txtExists method', function () {
	expect($this->lang::txtExists('message_index'))->toBeFalse()
		->and($this->lang::txtExists('message_index', file: 'General'))->toBeTrue();
});

describe('setTxt method', function () {
	test('sets value with string key', function () {
		unset(Lang::$txt['foo']);

		$this->lang::setTxt('foo', 'bar');

		expect(Lang::$txt['foo'])->toBe('bar');
	});

	test('sets value with array key and array value', function () {
		Lang::$txt['export_profile_data_desc_list'] = [
			'It may take some time for the system to finish compiling your data.',
			'A download link will appear on this page once the export process is complete.',
			'expiry' => '{0, plural,
				one {Old export files are deleted after # day.}
				other {Old export files are deleted after # days.}
			}'
		];

		Lang::setTxt(
			['export_profile_data_desc_list', 'expiry'],
			Lang::getTxt(['export_profile_data_desc_list', 'expiry'], [1])
		);

		expect(Lang::getTxt('export_profile_data_desc_list'))->toBe([
			'It may take some time for the system to finish compiling your data.',
			'A download link will appear on this page once the export process is complete.',
			'expiry' => 'Old export files are deleted after 1 day.'
		]);
	});

	test('sets value with array key (1 level)', function () {
		Lang::setTxt(['greeting'], 'Hi');

		expect(Lang::$txt['greeting'])->toBe('Hi');
	});

	test('sets value with array key (2 levels)', function () {
		Lang::setTxt(['messages', 'welcome'], 'Welcome!');

		expect(Lang::$txt['messages']['welcome'])->toBe('Welcome!');
	});

	test('sets value with array key (3 levels)', function () {
		Lang::setTxt(['a', 'b', 'c'], 'deep');

		expect(Lang::$txt['a']['b']['c'])->toBe('deep');
	});

	test('setTxt with empty array key does not modify existing data', function () {
		Lang::$txt['foo'] = 'bar';
		Lang::$txt['section'] = ['key' => 'value'];

		$before = Lang::$txt;

		Lang::setTxt([], 'should not affect anything');

		expect(Lang::$txt)->toEqual($before);
	});
});

describe('getTxt method', function () {
	beforeEach(function () {
		Lang::$txt['lang_locale'] = 'en_US';
	});

	test('with empty key', function () {
		expect($this->lang::getTxt(''))
			->toBe('');
	});

	test('with non-exist key', function () {
		expect($this->lang::getTxt('foo_bar'))
			->toBe('');
	});

	test('with array key and args', function () {
		Lang::$txt['foo_bars'] = ['foo', 'bar', 'param' => '{0, plural, one {# day} other {# days}}'];

		expect($this->lang::getTxt(['foo_bars', 'param'], [1]))
			->toBe('1 day');
	});

	test('with array key and exception when pattern is wrong', function () {
		Lang::$txt['foo_bars'] = ['foo', 'bar', 'param' => '{0, plural, one {# day} other {# days}'];

		try {
			$result = $this->lang::getTxt(['foo_bars', 'param'], [1]);
		} catch (IntlException $e) {
			$result = $e->getMessage();
		}

		expect($result)->toBe('');
	});

	test('with array key that does not exist', function () {
		expect($this->lang::getTxt(['unknown']))
			->toBe('');
	});

	test('with replacements', function () {
		Lang::$txt['test'] = 'This word is {foo}';

		expect($this->lang::getTxt('test', ['foo' => 'bar']))
			->toBe('This word is bar');
	});

	test('with exception when pattern is wrong', function () {
		Lang::$txt['number_of_users'] = '{0, plural2,
			one {# user}
			other {# users}
		}';

		try {
			$result = $this->lang::getTxt('number_of_users', [2]);
		} catch (IntlException $e) {
			$result = $e->getMessage();
		}

		expect($result)->toBe('');
	});

	test('with en_US locale', function () {
		Lang::$txt['number_of_users'] = '{0, plural,
			one {# user}
			other {# users}
		}';

		expect($this->lang::getTxt('number_of_users', [1]))
			->toBe('1 user')
			->and($this->lang::getTxt('number_of_users', [2]))
			->toBe('2 users')
			->and($this->lang::getTxt('number_of_users', [10]))
			->toBe('10 users');
	});

	test('with ru_RU locale', function () {
		Lang::$txt['lang_locale'] = 'ru_RU';
		Lang::$txt['number_of_users'] = '{0, plural,
			one {# пользователь}
			few {# пользователя}
			other {# пользователей}
		}';

		expect($this->lang::getTxt('number_of_users', [1]))
			->toBe('1 пользователь')
			->and($this->lang::getTxt('number_of_users', [2]))
			->toBe('2 пользователя')
			->and($this->lang::getTxt('number_of_users', [10]))
			->toBe('10 пользователей');
	});

	test('with file param', function () {
		unset(Lang::$txt['message_index']);

		$messageIndex = $this->lang::getTxt('message_index', file: 'General');

		expect($messageIndex)->toBe('Message Index');
	});
})->skip(! extension_loaded('intl'));

test('tokenTxtReplace method', function () {
	expect($this->lang::tokenTxtReplace('{user}'))->toBe('user');
});

test('numberFormat method', function () {
	expect($this->lang::numberFormat(10))->toBeString();
});
