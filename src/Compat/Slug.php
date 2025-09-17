<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use Bugo\Compat\Cache\CacheApi;

class Slug implements \Stringable
{
	public static array $known = [];

	protected string $slug;

	public function __construct(string $string, string $type, int $id, int $max_length = 30)
	{
		$this->slug = $this->generateSlug($string, $max_length);
	}

	public function __toString(): string
	{
		return $this->slug;
	}

	public static function create(string $string, string $type, int $id, int $max_length = 30): self
	{
		return new self($string, $type, $id, $max_length);
	}

	public static function setRequested(string $slug, string $type, int $id): void
	{
		$instance = new self('', $type, $id);
		$instance->slug = $slug;

		self::$known[$type][$id] = $instance;
	}

	public static function getCached(string $type, int $id): string
	{
		if (empty(Config::$modSettings['cache_enable'])) {
			return '';
		}

		return (string) CacheApi::get('slug_type-' . $type . '_id-' . $id);
	}

	protected function generateSlug(string $string, int $max_length): string
	{
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
		$slug = trim($slug, '-');
		$slug = substr($slug, 0, $max_length);
		$slug = rtrim($slug, '-');

		return $slug ?: 'slug';
	}
}
