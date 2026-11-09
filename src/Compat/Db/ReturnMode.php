<?php declare(strict_types=1);

namespace Bugo\Compat\Db;

enum ReturnMode: int
{
	case Off       = 0;
	case SingleRow = 1;
	case MultiRow  = 2;
}
