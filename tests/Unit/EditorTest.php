<?php declare(strict_types=1);

use Bugo\Compat\{Editor, Utils};

test('constructor', function () {
	$options = [
		'id' => 'foo_bar',
	];

	new Editor($options);

	expect(Utils::$context['post_box_name'])
		->toEqual($options['id']);
});
