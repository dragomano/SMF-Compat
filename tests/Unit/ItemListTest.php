<?php declare(strict_types=1);

use Bugo\Compat\ItemList;
use Exception;

test('constructor', function () {
	try {
		new ItemList([]);
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
