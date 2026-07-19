<?php declare(strict_types=1);

use Bugo\Compat\UserDataset;

test('enum cases exist', function () {
	expect(UserDataset::cases())->toHaveCount(5)
		->and(UserDataset::None->value)->toBe('none')
		->and(UserDataset::Minimal->value)->toBe('minimal')
		->and(UserDataset::Basic->value)->toBe('basic')
		->and(UserDataset::Normal->value)->toBe('normal')
		->and(UserDataset::Profile->value)->toBe('profile');
});

test('tryFrom works', function () {
	expect(UserDataset::tryFrom('normal'))->toBe(UserDataset::Normal)
		->and(UserDataset::tryFrom('invalid'))->toBeNull();
});
