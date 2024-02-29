<?php declare(strict_types=1);

use Bugo\Compat\Calendar;

beforeEach(function () {
	$this->lowDate = date('Y-m-d', time());
	$this->highDate = date('Y-m-d', time() + 7 * 24 * 60 * 60);
	$this->result = [$this->lowDate => $this->highDate];
});

test('getBirthdayRange method', function () {
	expect(Calendar::getBirthdayRange($this->lowDate, $this->highDate))
		->toBe($this->result);
});

test('getEventRange method', function () {
	expect(Calendar::getEventRange($this->lowDate, $this->highDate))
		->toBe($this->result);
});

test('getHolidayRange method', function () {
	expect(Calendar::getHolidayRange($this->lowDate, $this->highDate))
		->toBe($this->result);
});
