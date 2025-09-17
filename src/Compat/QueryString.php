<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

class QueryString
{
	public static array $route_parsers = [
		'msgs' => Msg::class,
		'msg'  => Msg::class,
		'topics' => Topic::class,
		'topic'  => Topic::class,
		'boards' => Board::class,
		'board'  => Board::class,
	];

	public static function rewriteAsQueryless(string $buffer): string
	{
		return $buffer;
	}

	public static function buildRoute(array|string $params): string
	{
		if (is_string($params)) {
			$params = strtr(ltrim($params, '?'), ';', '&');
			parse_str($params, $temp);
			$params = $temp;
		}

		$query = [];
		foreach ($params as $key => $value) {
			$query[] = $key . ((string) $value !== '' ? '=' . $value : '');
		}

		return ! empty($query) ? '?' . implode(';', $query) : '';
	}

	public static function parseRoute(string $path, array $params): array
	{
		if (! str_starts_with($path, '/')) {
			return $params;
		}

		$modified_path = preg_replace('~/([^,/]+),~', '/$1=', $path);
		$replaced_path = strtr($modified_path, '/', '&');
		$query_string = substr(preg_replace('/&(\w+)(?=&|$)/', '&$1=', $replaced_path), 1);

		parse_str($query_string, $new_params);

		foreach ($params as $key => $value) {
			$new_params[$key] = $value;
		}

		return $new_params;
	}

	public static function getRouteParser(string $route_base): ?string
	{
		return self::$route_parsers[$route_base] ?? null;
	}

	public static function isFilteredRequest(array $value_list, string $var): bool
	{
		$matched = false;

		if (isset($_REQUEST[$var], $value_list[$_REQUEST[$var]])) {
			if (is_array($value_list[$_REQUEST[$var]])) {
				foreach ($value_list[$_REQUEST[$var]] as $subvar => $subvalues) {
					$matched |= isset($_REQUEST[$subvar]) && in_array($_REQUEST[$subvar], $subvalues);
				}
			} else {
				$matched = true;
			}
		}

		return (bool) $matched;
	}
}
