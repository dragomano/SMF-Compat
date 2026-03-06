<?php declare(strict_types=1);

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
