<?php declare(strict_types=1);

use Bugo\Compat\Theme;
use Bugo\Compat\Utils;

beforeEach(function () {
	$this->theme = new Theme();
});

test('constructor', function () {
	expect($this->theme::$current->settings)->toBeArray()
		->and($this->theme::$current->options)->toBeArray()
		->and($this->theme::$current)->toBeInstanceOf(stdClass::class);
});

test('load method', function () {
	Utils::$context['current_action'] = null;
	Utils::$context['current_subaction'] = null;
	$_REQUEST['action'] = 'foo';
	$_REQUEST['sa'] = 'bar';

	$this->theme::load();

	expect(Utils::$context['current_action'])->toBe('foo');
	expect(Utils::$context['current_subaction'])->toBe('bar');

	unset($_REQUEST);
});

test('addJavaScriptVar method', function () {
	$this->theme::addJavaScriptVar('foo', 'bar');

	expect(Utils::$context['javascript_vars']['foo'])->toBe('bar');
});

test('addInlineCss method', function () {
	$this->theme::addInlineCss('');

	expect(Utils::$context['css_header'])->toBeEmpty();

	$this->theme::addInlineCss('foo');

	expect(Utils::$context['css_header'])->toContain('foo');
});

test('addInlineJavaScript method', function () {
	$this->theme::addInlineJavaScript('');

	expect(Utils::$context['javascript_inline']['standard'])->toBeEmpty();

	$this->theme::addInlineJavaScript('foo', true);

	expect(Utils::$context['javascript_inline']['defer'])->toContain('foo');

	$this->theme::addInlineJavaScript('bar');

	expect(Utils::$context['javascript_inline']['standard'])->toContain('bar');
});

test('loadCSSFile method', function () {
	try {
		$this->theme::loadCSSFile('test.css');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadJavaScriptFile method', function () {
	try {
		$this->theme::loadJavaScriptFile('test.js');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadEssential method', function () {
	try {
		$this->theme::loadEssential();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('loadTemplate method', function () {
	try {
		$this->theme::loadTemplate('Test');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('setupContext method', function () {
	try {
		$this->theme::setupContext();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
