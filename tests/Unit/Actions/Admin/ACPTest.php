<?php declare(strict_types=1);

use Bugo\Compat\Actions\Admin\ACP;

beforeEach(function () {
	$this->vars = ['foo' => 'bar'];
});

test('saveDBSettings method', function () {
	ACP::saveDBSettings($this->vars);

	expect($this->vars['foo'])->toBe('changed');
});

test('prepareDBSettingContext method', function () {
	ACP::prepareDBSettingContext($this->vars);

	expect($this->vars['foo'])->toBe('changed');
});
