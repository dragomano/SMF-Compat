<?php declare(strict_types=1);

/**
 * Msg.php
 *
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024 Bugo
 * @license https://opensource.org/license/mit/ MIT
 *
 * @version 0.2
 */

namespace Bugo\Compat;

use function preparsecode;
use function un_preparsecode;

class Msg
{
	public static function preparseCode(string &$message): void
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		preparsecode($message);
	}

	public static function unPreparseCode(string $message): array|string|null
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return un_preparsecode($message);
	}
}
