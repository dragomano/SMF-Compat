<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function constructPageIndex;

class PageIndex implements \Stringable
{
	private string $index;

	public function __construct(
		string $base_url,
		int &$start,
		int $num_items,
		int $num_per_page,
		bool $short_format = false,
		bool $show_prevnext = true,
		array $template_overrides = []
	)
	{
		$this->index = constructPageIndex(
			$base_url, $start, $num_items, $num_per_page, $short_format, $show_prevnext, $template_overrides
		);
	}

	public function __toString(): string
	{
		return $this->index;
	}
}
