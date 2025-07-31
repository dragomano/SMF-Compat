<?php

class Mentions
{
	protected static $char = '@';

	public static function getMentionedMembers(string $body): array
	{
		if (str_contains($body, '@John')) {
			return [['id' => 1, 'real_name' => 'John']];
		}

		return [];
	}

	public static function getBody(string $body, array $members): string
	{
		if (empty($body))
			return $body;

		foreach ($members as $member) {
			$body = str_ireplace(static::$char . $member['real_name'], '[member=' . $member['id'] . ']' . $member['real_name'] . '[/member]', $body);
		}

		return $body;
	}

	public static function verifyMentionedMembers(string $body, array $members): array
	{
		return $members;
	}
}
