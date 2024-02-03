<?php declare(strict_types=1);

/**
 * PageIndex.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.1
 */

namespace Bugo\Compat;

use Stringable;
use function constructPageIndex;

class PageIndex implements Stringable
{
	private string $index;

	public function __construct(string $base_url, int &$start, int $max_value, int $num_per_page)
	{
		$this->index = constructPageIndex($base_url, $start, $max_value, $num_per_page);
	}

	public function __toString(): string
	{
		return $this->index;
	}
}
