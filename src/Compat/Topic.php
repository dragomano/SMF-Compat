<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function approveTopics;
use function createPost;
use function removeTopic;

class Topic
{
	public static int $id;

	public function __construct()
	{
		if (! isset($GLOBALS['topic'])) {
			$GLOBALS['topic'] = 0;
		}

		$id = (int) $GLOBALS['topic'];

		self::$id = &$id;
	}

	public static function create(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) createPost($msgOptions, $topicOptions, $posterOptions);
	}

	public static function approve(array|int $topics, bool $approve = true, bool $notify = true): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) approveTopics($topics, $approve, $notify);
	}

	public static function remove(int $topic, bool $decreasePostCount = true): bool
	{
		RequireHelper::requireFile('RemoveTopic.php');

		return (bool) removeTopic($topic, $decreasePostCount);
	}
}
