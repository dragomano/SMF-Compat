<?php declare(strict_types=1);

use Bugo\Compat\Tasks\GenericTask;

test('execute method', function () {
	$callable = new class {
		public function __invoke(int $number): int
		{
			return $number * 2;
		}
	};

	expect($callable)->toBeCallable();

	$task = new class(['callable' => [$callable, '__invoke'], 'number' => 2]) extends GenericTask {};

	expect($task->execute())->toBeTrue();
});
