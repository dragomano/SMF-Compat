<?php declare(strict_types=1);

use Bugo\Compat\Logging;

test('logAction method', function () {
	expect(Logging::logAction('foo'))->toBeInt();
});
