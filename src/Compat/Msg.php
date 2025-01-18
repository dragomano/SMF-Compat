<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use function approvePosts;
use function createPost;
use function modifyPost;
use function preparsecode;
use function removeMessage;
use function un_preparsecode;

class Msg
{
	public static function preparseCode(string &$message): void
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		preparsecode($message);
	}

	public static function un_preparsecode(string $message): array|string|null
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return un_preparsecode($message);
	}

	public static function create(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return createPost($msgOptions, $topicOptions, $posterOptions);
	}

	public static function modify(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return modifyPost($msgOptions, $topicOptions, $posterOptions);
	}

	public static function approve(array|int $msgs, bool $approve = true, bool $notify = true): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Subs-Post.php';

		return approvePosts($msgs, $approve, $notify);
	}

	public static function remove(int $message, bool $decreasePostCount = true): bool
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'RemoveTopic.php';

		return removeMessage($message, $decreasePostCount);
	}
}
