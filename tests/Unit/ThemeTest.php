<?php declare(strict_types=1);

use Bugo\Compat\Theme;
use Bugo\Compat\Utils;

beforeAll(function () {
	new Theme();
});

test('constructor', function () {
	expect(Theme::$current->settings)->toBeArray();
	expect(Theme::$current->options)->toBeArray();
	expect(Theme::$current)->toBeInstanceOf(stdClass::class);
});

test('addJavaScriptVar method', function () {
	Theme::addJavaScriptVar('foo', 'bar');

	expect(Utils::$context['javascript_vars']['foo'])->toBe('bar');
});

test('addInlineCss method', function () {
	Theme::addInlineCss('');

	expect(Utils::$context['css_header'])->toBeEmpty();

	Theme::addInlineCss('foo');

	expect(Utils::$context['css_header'])->toContain('foo');
});

test('addInlineJavaScript method', function () {
	Theme::addInlineJavaScript('');

	expect(Utils::$context['javascript_inline']['standard'])->toBeEmpty();

	Theme::addInlineJavaScript('foo', true);

	expect(Utils::$context['javascript_inline']['defer'])->toContain('foo');

	Theme::addInlineJavaScript('bar');

	expect(Utils::$context['javascript_inline']['standard'])->toContain('bar');
});

test('loadCSSFile method', function () {
	try {
		Theme::loadCSSFile('test.css');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadJavaScriptFile method', function () {
	try {
		Theme::loadJavaScriptFile('test.js');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadEssential method', function () {
	try {
		Theme::loadEssential();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadTemplate method', function () {
	try {
		Theme::loadTemplate('Test');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
