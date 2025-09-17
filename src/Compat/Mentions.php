<?php declare(strict_types=1);

/**
 * @package SMF Compat
 * @link https://github.com/dragomano/smf-compat
 * @author Bugo <bugo@dragomano.ru>
 * @copyright 2024-2025 Bugo
 * @license https://opensource.org/license/mit/ MIT
 */

namespace Bugo\Compat;

use BadMethodCallException;
use Mentions as ExternalMentions;

/**
 * @method static array getMentionsByContent(string $content_type, int $content_id, array $members = [])
 * @method static void insertMentions(string $content_type, int $content_id, array $members, int $id_member)
 * @method static array modifyMentions(string $content_type, int $content_id, array $members, int $id_member)
 * @method static string getBody(string $body, array $members)
 * @method static array getMentionedMembers(string $body)
 * @method static array getExistingMentions(string $body)
 * @method static array verifyMentionedMembers(string $body, array $members)
 * @method static array getQuotedMembers(string $body, int $poster_id)
 */
class Mentions
{
	protected static string $char = '@';

	public static function __callStatic(string $name, array $arguments)
	{
		require_once Config::$sourcedir . DIRECTORY_SEPARATOR . 'Mentions.php';

		if (method_exists(ExternalMentions::class, $name)) {
			return ExternalMentions::$name(...$arguments);
		}

		throw new BadMethodCallException(self::class . ": method `$name` does not exist.");
	}
}
