<?php declare(strict_types=1);

namespace Bugo\Compat;

use function approveTopics;
use function createPost;
use function removeTopics;

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

	public static function approve(array|int $topics, bool $approve = true): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) approveTopics($topics, $approve);
	}

	public static function remove(array|int $topics, bool $decreasePostCount = true): void
	{
		RequireHelper::requireFile('RemoveTopic.php');

		removeTopics($topics, $decreasePostCount);
	}
}
