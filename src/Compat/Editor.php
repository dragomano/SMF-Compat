<?php declare(strict_types=1);

/**
 * Editor.php
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

use function create_control_richedit;

class Editor
{
	public function __construct(array $options)
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Editor.php';

		create_control_richedit($options);

		Utils::$context['post_box_name'] = $options['id'];
	}
}
