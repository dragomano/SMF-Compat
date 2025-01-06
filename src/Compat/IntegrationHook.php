<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function add_integration_function;
use function call_integration_hook;
use function remove_integration_function;

class IntegrationHook
{
	public static function call(string $name, array $parameters = []): array
	{
		return call_integration_hook($name, $parameters);
	}

	public static function add(
		string $name,
		string $function,
		bool $permanent = true,
		string $file = '',
		bool $object = false
	): void
	{
		add_integration_function($name, $function, $permanent, $file, $object);
	}

	public static function remove(
		string $name,
		string $function,
		bool $permanent = true,
		string $file = '',
		bool $object = false
	): void
	{
		remove_integration_function($name, $function, $permanent, $file, $object);
	}
}
