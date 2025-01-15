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
	public int $port;

	public function __construct(protected string $url, bool $normalize = false)
	{
		$normalize ? $this->normalize() : $this->parse();
	}

	public function __toString(): string
	{
		return $this->url;
	}

	public function __get(string $name): string|int
	{
		return $this->$name ?? ($name === 'port' ? 0 : '');
	}

	public static function create(string $url, bool $normalize = false): self
	{
		return new self($url, $normalize);
	}

	public function normalize(): self
	{
		return self::create(normalize_iri($this->url));
	}

	public function parse(int $component = -1): int|string|array|null|false
	{
		$parsed = parse_iri($this->url, $component);

		foreach (['scheme', 'host', 'port', 'user', 'pass', 'path', 'query', 'fragment'] as $prop) {
			unset($this->{$prop});

			if (! isset($parsed[$prop])) continue;

			if ($prop === 'port') {
				$parsed['port'] = (int) $parsed['port'];
			}

			$this->{$prop} = $parsed[$prop] = is_string($parsed[$prop]) ? rawurldecode($parsed[$prop]) : $parsed[$prop];
		}

		return match ($component) {
			PHP_URL_SCHEME   => $this->scheme ?? null,
			PHP_URL_HOST     => $this->host ?? null,
			PHP_URL_PORT     => $this->port ?? null,
			PHP_URL_USER     => $this->user ?? null,
			PHP_URL_PASS     => $this->pass ?? null,
			PHP_URL_PATH     => $this->path ?? null,
			PHP_URL_QUERY    => $this->query ?? null,
			PHP_URL_FRAGMENT => $this->fragment ?? null,
			default          => $parsed,
		};
	}

	public function proxied(): self
	{
		return self::create(get_proxied_url($this->url));
	}
}
