<?php declare(strict_types=1);

use Bugo\Compat\Graphics\Image;

beforeEach(function () {
	$this->image = new Image();
});

test('createThumbnail method', function () {
	expect($this->image::createThumbnail('picture.png', 300, 200))->toBeTrue();
});
