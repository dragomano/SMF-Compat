<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function httpsOn;
use function memoryReturnBytes;
use function sm_temp_dir;

class Sapi
{
	public static function memoryReturnBytes(string $val): int
	{
		return memoryReturnBytes($val);
	}

	public static function getTempDir(): string
	{
		RequireHelper::requireFile('Subs-Admin.php');

		return sm_temp_dir();
	}

	public static function setTimeLimit(int $limit = 600): void
	{
		@set_time_limit($limit);
	}

	public static function httpsOn(): bool
	{
		return httpsOn();
	}

	public static function canonicalPath(string $path): string|false
	{
		$path = trim($path);
		if ($path === '') {
			return realpath('');
		}

		$real = realpath($path);
		if ($real !== false) {
			return $real;
		}

		// Normalize separators
		$normalized = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $path);

		// Resolve . and ..
		$parts = explode(DIRECTORY_SEPARATOR, $normalized);
		$result = [];

		foreach ($parts as $part) {
			if ($part === '' || $part === '.') {
				continue;
			}

			if ($part === '..') {
				if (empty($result) || $result[0] === '..') {
					$result[] = $part;
				} else {
					array_pop($result);
				}
			} else {
				$result[] = $part;
			}
		}

		// Handle absolute paths
		// @codeCoverageIgnoreStart
		if (DIRECTORY_SEPARATOR === '\\' && str_starts_with($normalized, '\\')) {
			$root = substr(getcwd(), 0, strcspn(getcwd(), '\\'));
			array_unshift($result, $root);
		} elseif (DIRECTORY_SEPARATOR === '/' && str_starts_with($normalized, '/')) {
			array_unshift($result, '');
		}
		// @codeCoverageIgnoreEnd

		return implode(DIRECTORY_SEPARATOR, $result);
	}
}
