<?php declare(strict_types=1);

use Bugo\Compat\Graphics\Image;

beforeEach(function () {
	$this->image = new Image('picture.png');
});

test('createThumbnail method', function () {
	expect($this->image->createThumbnail(300, 200))->toBeTrue();
});

test('constructor sets source to realpath when file exists', function () {
	$tempFile = tempnam(sys_get_temp_dir(), 'test_');
	file_put_contents($tempFile, 'dummy');

	$image = new Image($tempFile);

	expect($image->source)->toBe(realpath($tempFile));

	@unlink($tempFile);
});
