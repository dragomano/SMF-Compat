<?php declare(strict_types=1);

use Bugo\Compat\PageIndex;

beforeEach(function () {
	$this->start = 0;
});

test('constructor', function () {
	try {
		new PageIndex('https://foo.bar', $this->start, 10, 5);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});

test('stringable interface', function () {
	$index = new PageIndex('https://foo.bar', $this->start, 10, 5);

	expect((string) $index)->toBeString();
});
