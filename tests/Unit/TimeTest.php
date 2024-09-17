<?php declare(strict_types=1);

use Bugo\Compat\Time;

test('timeformat method', function () {
	expect(Time::timeformat(time()))->toBeString();
});
