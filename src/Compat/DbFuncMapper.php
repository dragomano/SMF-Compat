<?php declare(strict_types=1);

/**
 * DbFuncMapper.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function array_key_exists;

class DbFuncMapper
{
	public function __call(string $name, array $arguments)
	{
		if ($name === 'search_query') {
			$name = 'query';
		}

		$name = 'db_' . $name;

		if (array_key_exists($name, Utils::$smcFunc)) {
			return Utils::$smcFunc[$name](...$arguments);
		}

		return false;
	}
}
