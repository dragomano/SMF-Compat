<?php declare(strict_types=1);

use Bugo\Compat\Security;

test('checkSubmitOnce method', function () {
	expect(Security::checkSubmitOnce('register'))->toBeTrue();
});
