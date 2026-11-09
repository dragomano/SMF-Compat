<?php declare(strict_types=1);

namespace Bugo\Compat\Db;

enum InsertType: string
{
	case Insert  = 'insert';
	case Replace = 'replace';
	case Ignore  = 'ignore';
}
