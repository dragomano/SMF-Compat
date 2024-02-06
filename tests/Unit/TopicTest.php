<?php declare(strict_types=1);

use Bugo\Compat\Topic;

test('constructor', function () {
	$this->topic = new Topic();

	expect($this->topic::$id)->toBe(0);
});
