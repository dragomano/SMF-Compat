<?php declare(strict_types=1);

use Bugo\Compat\Time;

test('strftime method', function () {
	expect(Time::strftime('%Y-%m-%d', time()))->toBeString();
});

test('timeformat method', function () {
	expect(Time::timeformat(time()))->toBeString();
});
