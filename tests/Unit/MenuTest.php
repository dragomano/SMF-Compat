<?php declare(strict_types=1);

use Bugo\Compat\Menu;
use Bugo\Compat\Utils;

beforeEach(function () {
	new Utils();

	$menu = Utils::$context['admin_menu_name'] = 'test';
	Utils::$context[$menu]['tab_data'] = [];

	$this->menu = new Menu();
});

test('constructor', function () {
	expect($this->menu::$loaded)->toBeArray()
		->and($this->menu->tab_data)->toBeArray();
});
