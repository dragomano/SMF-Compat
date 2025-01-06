<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat\Tasks;

use function call_helper;
use function call_user_func_array;
use function is_callable;

class GenericTask extends BackgroundTask
{
	public function execute(): bool
	{
		$callableTask = call_helper($this->_details['callable'], true);

		$args = $this->_details;
		unset($args['callable']);

		if (is_callable($callableTask)) {
			call_user_func_array($callableTask, $args);
		}

		return true;
	}
}
