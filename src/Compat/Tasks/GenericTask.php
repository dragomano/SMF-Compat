<?php declare(strict_types=1);

namespace Bugo\Compat\Tasks;

use Bugo\Compat\Utils;

use function call_user_func_array;

class GenericTask extends BackgroundTask
{
	public function execute(): bool
	{
		$callableTask = Utils::getCallable($this->_details['callable']);

		$args = $this->_details;
		unset($args['callable']);

		if (! empty($callableTask)) {
			call_user_func_array($callableTask, $args);
		}

		return true;
	}
}
