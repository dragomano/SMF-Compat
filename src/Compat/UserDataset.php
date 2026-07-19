<?php declare(strict_types=1);

namespace Bugo\Compat;

enum UserDataset: string
{
	case None    = 'none';
	case Minimal = 'minimal';
	case Basic   = 'basic';
	case Normal  = 'normal';
	case Profile = 'profile';
}
