<?php declare(strict_types=1);

use Bugo\Compat\QueryString;

test('rewriteAsQueryless method', function () {
	expect(QueryString::rewriteAsQueryless('foo'))->toBeString();
});

test('isFilteredRequest method', function () {
	$_REQUEST['action'] = 'test';

	expect(QueryString::isFilteredRequest(['test' => true], 'action'))->toBeTrue()
		->and(QueryString::isFilteredRequest(['other' => true], 'action'))->toBeFalse();
});

test('isFilteredRequest method with subvalue array', function () {
	$_REQUEST['action'] = 'test';
	$_REQUEST['subvar'] = 'value1';

	expect(QueryString::isFilteredRequest(['test' => ['subvar' => ['value1', 'value2']]], 'action'))->toBeTrue()
		->and(QueryString::isFilteredRequest(['test' => ['subvar' => ['value3']]], 'action'))->toBeFalse();
});

test('buildRoute method', function () {
	$result = QueryString::buildRoute(['action' => 'test', 'id' => 1]);

	expect($result)->toBe('?action=test;id=1');
});

test('buildRoute method with string params', function () {
	$result = QueryString::buildRoute('?action=test;id=1');

	expect($result)->toBe('?action=test;id=1');
});

test('parseRoute method', function () {
	$params = QueryString::parseRoute('/boards/1', ['test' => 'value']);

	expect($params)->toHaveKey('test')
		->and($params['test'])->toBe('value');
});

test('parseRoute method without leading slash', function () {
	$params = QueryString::parseRoute('boards/1', ['test' => 'value']);

	expect($params)->toEqual(['test' => 'value']);
});

test('getRouteParser method', function () {
	$result = QueryString::getRouteParser('boards');

	expect(QueryString::$route_parsers)->toHaveKey('boards')
		->and($result)->toBe('Bugo\Compat\Board');
});
