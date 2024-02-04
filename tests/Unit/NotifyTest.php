<?php declare(strict_types=1);

use Bugo\Compat\Notify;

test('getNotifyPrefs method', function () {
	expect(Notify::getNotifyPrefs(1))->toBeArray();
});
