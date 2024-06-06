<?php declare(strict_types=1);

use Bugo\Compat\Actions\BoardIndex;

test('call method', function () {
	try {
		BoardIndex::call();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
