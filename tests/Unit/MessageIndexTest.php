<?php declare(strict_types=1);

use Bugo\Compat\MessageIndex;

test('getBoardList method', function () {
	expect(MessageIndex::getBoardList())
		->toBeArray();
});
