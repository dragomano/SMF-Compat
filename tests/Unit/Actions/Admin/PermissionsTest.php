<?php declare(strict_types=1);

use Bugo\Compat\Actions\Admin\Permissions;

test('theme_inline_permissions', function () {
	try {
		Permissions::theme_inline_permissions('admin_forum');
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
