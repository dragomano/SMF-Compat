<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function create_control_richedit;

class Editor
{
	public function __construct(array $options)
	{
		RequireHelper::requireFile('Subs-Editor.php');

		create_control_richedit($options);

		Utils::$context['post_box_name'] = $options['id'];
	}
}
