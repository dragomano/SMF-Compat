<?php declare(strict_types=1);

use Bugo\Compat\Time;

test('strftime method', function () {
	expect(Time::strftime('%Y-%m-%d', time()))->toBeString();
});

test('stringFromUnix method', function () {
	expect(Time::stringFromUnix(time()))->toBeString();
});
