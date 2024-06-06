<?php declare(strict_types=1);

use Bugo\Compat\BackgroundTask;

test('execute method', function () {
	$task = new class(['foo' => 'bar']) extends BackgroundTask {
		public function execute(): bool
		{
			return true;
		}
	};

	expect($task->execute())->toBeTrue();
});
