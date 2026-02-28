<?php declare(strict_types=1);

namespace Bugo\Compat {
	if (! function_exists(__NAMESPACE__ . '\\function_exists')) {
		function function_exists(string $function): bool
		{
			if (($GLOBALS['slug_test_force_no_iconv'] ?? false) && $function === 'iconv') {
				return false;
			}

			return \function_exists($function);
		}
	}
}

namespace {
	use Bugo\Compat\Config;
	use Bugo\Compat\Slug;

	class TestableSlug extends Slug
	{
		public function transliteratePublic(string $string): string
		{
			return $this->transliterate($string);
		}
	}

	test('getCached method', function () {
		expect(Slug::getCached('topic', 1))->toBeString();

		Config::$modSettings['cache_enable'] = '1';

		expect(Slug::getCached('topic', 1))->toBeString();
	});

	test('getCached method when cache disabled', function () {
		Config::$modSettings['cache_enable'] = '';

		expect(Slug::getCached('topic', 3))->toBe('');
	});

	test('create method', function () {
		$slug = Slug::create('Test String', 'topic', 1);

		expect($slug)->toBeInstanceOf(Slug::class);
	});

	test('setRequested method', function () {
		Slug::setRequested('custom-slug', 'topic', 1);

		expect(Slug::$known['topic'][1])->toBeInstanceOf(Slug::class);
	});

	test('__toString method', function () {
		$slug = Slug::create('Test String', 'topic', 1);

		expect((string) $slug)->toBeString();
	});

	test('create method transliterates cyrillic to ascii slug', function () {
		$slug = Slug::create('Привет мир', 'topic', 2);

		expect((string) $slug)->toBe('privet-mir');
	});

	test('create method normalizes latin diacritics', function () {
		$slug = Slug::create('Über Café déjà vu', 'topic', 3);

		expect((string) $slug)->toBe('uber-cafe-deja-vu');
	});

	test('transliterate falls back to iconv when transliterator cannot process input', function () {
		$slug = new TestableSlug('', 'topic', 4);
		$brokenUtf8 = "\xD0\xFF";

		expect($slug->transliteratePublic($brokenUtf8))->toBe('');
	});

	test('transliterate returns original string when iconv is unavailable', function () {
		$slug = new TestableSlug('', 'topic', 5);
		$brokenUtf8 = "\xD0\xFF";

		$GLOBALS['slug_test_force_no_iconv'] = true;

		try {
			expect($slug->transliteratePublic($brokenUtf8))->toBe($brokenUtf8);
		} finally {
			unset($GLOBALS['slug_test_force_no_iconv']);
		}
	});
}
