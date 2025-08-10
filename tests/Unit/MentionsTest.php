<?php declare(strict_types=1);

use Bugo\Compat\Mentions;

beforeEach(function () {
	$this->body = '@John hello';
	$this->members = [
		['id' => 1, 'real_name' => 'John']
	];
});

test('getMentionedMembers method', function () {
	expect(Mentions::getMentionedMembers($this->body))
		->toBe($this->members);
});

test('getBody method', function () {
	expect(Mentions::getBody($this->body, $this->members))
		->toBe('[member=1]John[/member] hello');
});

test('verifyMentionedMembers method', function () {
	expect(Mentions::verifyMentionedMembers($this->body, $this->members))
		->toBe($this->members);
});

test('unknown method', function () {
	expect(fn() => Mentions::unknown())
		->toThrow(
			BadMethodCallException::class,
			Mentions::class . ": method `unknown` does not exist"
		);
});
