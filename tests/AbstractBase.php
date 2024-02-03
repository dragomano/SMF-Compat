<?php declare(strict_types=1);

namespace Tests;

use Bugo\Compat\{Config, Utils};
use PHPUnit\Framework\TestCase;

abstract class AbstractBase extends TestCase
{
	protected function setUp(): void
	{
		require_once __DIR__ . '/boostrap.php';

		Config::$sourcedir = __DIR__ . DIRECTORY_SEPARATOR . 'files';

		Utils::$context['css_header'] = [];
		Utils::$context['javascript_inline'] = ['defer' => [], 'standard' => []];
	}
}
