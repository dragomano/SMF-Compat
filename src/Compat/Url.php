<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use stdClass;

use function get_proxied_url;
use function is_string;
use function normalize_iri;
use function parse_iri;
use function rawurldecode;

class Url extends stdClass implements \Stringable
{
	public function __construct(public string $url, bool $normalize = false)
	{
		$normalize ? $this->normalize() : $this->parse();
	}

	public function __toString(): string
	{
		return $this->url;
	}

	public static function create(string $url, bool $normalize = false): self
	{
		return new self($url, $normalize);
	}

	public function normalize(): self
	{
		return self::create(normalize_iri($this->url));
	}

	public function parse(int $component = -1): string|int|array|null|bool
	{
		$parsed = parse_iri($this->url, $component);

		foreach (['scheme', 'host', 'port', 'user', 'pass', 'path', 'query', 'fragment'] as $prop) {
			unset($this->{$prop});

			if (isset($parsed[$prop])) {
				$this->{$prop} = $parsed[$prop] = is_string($parsed[$prop]) ? rawurldecode($parsed[$prop]) : $parsed[$prop];
			}
		}

		return $parsed;
	}

	public function proxied(): self
	{
		return self::create(get_proxied_url($this->url));
	}
}
