<?php declare(strict_types=1);

namespace Bugo\Compat;

interface Routable
{
	public static function buildRoute(array $params): array;

	public static function parseRoute(array $route, array $params = []): array;
}
