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

	test('with array key', function () {
		Lang::$txt['foo_bars'] = ['foo', 'bar'];

		expect($this->lang::getTxt(['foo_bars', 1]))
			->toBe('bar');
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
})->skip(! extension_loaded('intl'));
