<?php declare(strict_types=1);

use Bugo\Compat\Config;
use Bugo\Compat\Slug;

test('getCached method', function () {
	expect(Slug::getCached('topic', 1))->toBeString();

	Config::$modSettings['cache_enable'] = '1';

	expect(Slug::getCached('topic', 1))->toBeString();
});
