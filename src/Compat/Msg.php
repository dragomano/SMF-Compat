<?php declare(strict_types=1);

namespace Bugo\Compat;

use function approvePosts;
use function createPost;
use function modifyPost;
use function removeMessage;

class Msg
{
	/**
	 * @deprecated use Parser::sanitize
	 */
	public static function preparseCode(string &$message): void
	{
		$message = Parser::sanitize($message);
	}

	/**
	 * @deprecated use Parser::getEditableString
	 */
	public static function un_preparsecode(string $message): string
	{
		return Parser::getEditableString($message);
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
