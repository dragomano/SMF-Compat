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
		RequireHelper::requireFile('Subs-Post.php');

		preparsecode($message);
	}

	public static function un_preparsecode(string $message): array|string|null
	{
		RequireHelper::requireFile('Subs-Post.php');

		return un_preparsecode($message);
	}

	public static function create(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) createPost($msgOptions, $topicOptions, $posterOptions);
	}

	public static function modify(array &$msgOptions, array &$topicOptions, array &$posterOptions): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) modifyPost($msgOptions, $topicOptions, $posterOptions);
	}

	public static function approve(array|int $msgs, bool $approve = true, bool $notify = true): bool
	{
		RequireHelper::requireFile('Subs-Post.php');

		return (bool) approvePosts($msgs, $approve, $notify);
	}

	public static function remove(int $message, bool $decreasePostCount = true): bool
	{
		RequireHelper::requireFile('RemoveTopic.php');

		return (bool) removeMessage($message, $decreasePostCount);
	}
}
