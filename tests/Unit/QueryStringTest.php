<?php declare(strict_types=1);

use Bugo\Compat\QueryString;

test('rewriteAsQueryless method', function () {
	expect(QueryString::rewriteAsQueryless('foo'))->toBeString();
});
