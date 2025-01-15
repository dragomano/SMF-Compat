<?php declare(strict_types=1);

use Bugo\Compat\Tasks\ScheduledTask;

test('updateNextTaskTime method', function () {
	$task = new class(['foo' => 'bar']) extends ScheduledTask {
		public function execute(): bool
		{
			self::updateNextTaskTime();

			return true;
		}
	};

	try {
		$task->execute();
		$result = 'success';
	} catch (Exception $e) {
		$result = $e->getMessage();
	}

	expect($result)->toBeSuccess();
});
