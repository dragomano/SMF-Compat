<?php declare(strict_types=1);

use Bugo\Compat\Graphics\Image;

beforeEach(function () {
	$this->image = new Image();
});

test('makeThumbnail method', function () {
	expect($this->image::makeThumbnail('picture.png', 300, 200))->toBeTrue();
});
