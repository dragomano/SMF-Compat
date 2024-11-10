<?php declare(strict_types=1);

use Bugo\Compat\{Config, Lang, Utils};

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

// uses(Tests\TestCase::class)->in('Feature');
uses()->beforeAll(function () {
	Config::$sourcedir = __DIR__ . DIRECTORY_SEPARATOR . 'files';

	Utils::$context['css_header'] = [];

	Utils::$context['javascript_inline'] = ['defer' => [], 'standard' => []];

	Utils::$smcFunc['htmlspecialchars'] = fn(...$params) => htmlspecialchars(...$params);

	Utils::$smcFunc['db_query'] = fn(...$params) => new \stdClass();
	Utils::$smcFunc['db_search_query'] = Utils::$smcFunc['db_query'];
	Utils::$smcFunc['db_fetch_row'] = fn(...$params) => [];
	Utils::$smcFunc['db_fetch_assoc'] = fn(...$params) => [];
	Utils::$smcFunc['db_fetch_all'] = fn(...$params) => [];
	Utils::$smcFunc['db_free_result'] = fn(...$params) => true;
	Utils::$smcFunc['db_insert'] = fn(...$params) => 0;
	Utils::$smcFunc['db_num_rows'] = fn(...$params) => 0;
	Utils::$smcFunc['db_transaction'] = fn(...$params) => true;
	Utils::$smcFunc['db_get_version'] = fn(...$params) => '';
})->in(__DIR__);

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeSuccess', function () {
	return $this->toBe('success');
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

if (! class_exists('SMF_BackgroundTask')) {
	abstract class SMF_BackgroundTask
	{
		protected array $_details;

		public function __construct(array $details)
		{
			$this->_details = $details;
		}
	}
}

if (! function_exists('logAction')) {
	function logAction(string $action, array $extra = []): int
	{
		return intval($action);
	}
}

if (! function_exists('constructPageIndex')) {
	function constructPageIndex(string $base_url, &$start, int $max_value, int $num_per_page): string
	{
		return $base_url;
	}
}

if (! function_exists('preparsecode')) {
	function preparsecode(string &$message): void
	{
		$message = 'changed';
	}
}

if (! function_exists('un_preparsecode')) {
	function un_preparsecode(string $message): string
	{
		return $message;
	}
}

if (! function_exists('checkSubmitOnce')) {
	function checkSubmitOnce(string $action): ?bool
	{
		return !!$action;
	}
}

if (! function_exists('db_extend')) {
	function db_extend(string $type = 'extra'): void
	{
	}
}

if (! function_exists('allowedTo')) {
	function allowedTo(string $permission): bool
	{
		return $permission === 'foo_bar';
	}
}

if (! function_exists('checkSession')) {
	function checkSession(string $type = 'post'): string
	{
		return '';
	}
}

if (! function_exists('isAllowedTo')) {
	function isAllowedTo(...$params): void
	{
	}
}

if (! function_exists('loadMemberData')) {
	function loadMemberData(...$params): array
	{
		return [$params];
	}
}

if (! function_exists('loadMemberContext')) {
	function loadMemberContext(...$params): bool|array
	{
		return true;
	}
}

if (! function_exists('updateMemberData')) {
	function updateMemberData(...$params): void
	{
	}
}

if (! function_exists('updateSettings')) {
	function updateSettings(array $settings): void
	{
		foreach ($settings as $key => $value) {
			Config::$modSettings[$key] = $value;
		}
	}
}

if (! function_exists('censorText')) {
	function censorText(string &$text): void
	{
		$text = 'changed';
	}
}

if (! function_exists('getLanguages')) {
	function getLanguages(): array
	{
		return [];
	}
}

if (! function_exists('loadLanguage')) {
	function loadLanguage(string $template_name, string $lang = ''): void
	{
		Lang::$txt['foo'] = $template_name;
	}
}

if (! function_exists('sentence_list')) {
	function sentence_list(array $sentence): string
	{
		return implode(',', $sentence);
	}
}

if (! function_exists('parse_bbc')) {
	function parse_bbc(
		string|bool $message,
		bool $smileys = true,
		string|int $cache_id = '',
		array $parse_tags = []
	): array|string
	{
		return is_bool($message) ? [$message, $smileys, $cache_id, $parse_tags] : $message;
	}
}

if (! function_exists('cache_get_data')) {
	function cache_get_data(string $key, int $ttl = 0): mixed
	{
		return Utils::$context['tmp'][$key] ?? null;
	}
}

if (! function_exists('cache_put_data')) {
	function cache_put_data(string $key, mixed $value, int $ttl = 0): void
	{
		Utils::$context['tmp'][$key] = $value;
	}
}

if (! function_exists('clean_cache')) {
	function clean_cache(): void
	{
		Utils::$context['tmp'] = [];
	}
}

if (! function_exists('fatal_error')) {
	function fatal_error(...$params): void
	{
		Utils::$context['error_title'] = $params[0];
	}
}

if (! function_exists('fatal_lang_error')) {
	function fatal_lang_error(...$params): void
	{
		Utils::$context['error_title'] = $params[0];
	}
}

if (! function_exists('log_error')) {
	function log_error(...$params): string
	{
		return '';
	}
}

if (! function_exists('call_integration_hook')) {
	function call_integration_hook(string $hook, array $args = []): array
	{
		return [$hook, $args];
	}
}

if (! function_exists('add_integration_function')) {
	function add_integration_function(...$params): void
	{
	}
}

if (! function_exists('remove_integration_function')) {
	function remove_integration_function(...$params): void
	{
	}
}

if (! function_exists('fetch_web_data')) {
	function fetch_web_data(string $url): bool|string
	{
		return $url !== '';
	}
}

if (! function_exists('memoryReturnBytes')) {
	function memoryReturnBytes(string $val): int
	{
		return intval($val);
	}
}

if (! function_exists('ssi_topBoards')) {
	function ssi_topBoards(int $num_top = 10, string $output_method = 'echo'): array
	{
		return [$num_top, $output_method];
	}
}

if (! function_exists('addJavaScriptVar')) {
	function addJavaScriptVar(string $key, string $value, bool $escape = false): void
	{
		Utils::$context['javascript_vars'][$key] = $value;
	}
}

if (! function_exists('addInlineCss')) {
	function addInlineCss(string $css): bool
	{
		if (empty($css))
			return false;

		Utils::$context['css_header'][] = $css;

		return true;
	}
}

if (! function_exists('addInlineJavaScript')) {
	function addInlineJavaScript(string $javascript, bool $defer = false): bool
	{
		if (empty($javascript))
			return false;

		Utils::$context['javascript_inline'][($defer === true ? 'defer' : 'standard')][] = $javascript;

		return true;
	}
}

if (! function_exists('loadCSSFile')) {
	function loadCSSFile(...$params): void
	{
	}
}

if (! function_exists('loadJavaScriptFile')) {
	function loadJavaScriptFile(...$params): void
	{
	}
}

if (! function_exists('loadTemplate')) {
	function loadTemplate(string $name): void
	{
	}
}

if (! function_exists('loadSubTemplate')) {
	function loadSubTemplate(string $sub_template_name, bool $fatal = false): void
	{
	}
}

if (! function_exists('JavaScriptEscape')) {
	function JavaScriptEscape(...$params): string
	{
		return '';
	}
}

if (! function_exists('obExit')) {
	function obExit(...$params): void
	{
	}
}

if (! function_exists('redirectexit')) {
	function redirectexit(string $url = ''): void
	{
	}
}

if (! function_exists('send_http_status')) {
	function send_http_status(...$params): void
	{
	}
}

if (! function_exists('shorten_subject')) {
	function shorten_subject(string $text, int $length = 150): string
	{
		return $text;
	}
}

if (! function_exists('smf_chmod')) {
	function smf_chmod(string $file): bool
	{
		return !!$file;
	}
}

if (! function_exists('smf_json_decode')) {
	function smf_json_decode(string $json, ?bool $returnAsArray = null): ?array
	{
		return [$json, $returnAsArray];
	}
}

if (! function_exists('un_htmlspecialchars')) {
	function un_htmlspecialchars(string $string): string
	{
		return $string;
	}
}

if (! function_exists('tokenTxtReplace')) {
	function tokenTxtReplace(string $string): string
	{
		return trim($string, '{}');
	}
}

if (! function_exists('call_helper')) {
	function call_helper(mixed $string, bool $return = false): mixed
	{
		return is_callable($string) && $return ? $string : false;
	}
}

if (! function_exists('timeformat')) {
	function timeformat(...$params): string
	{
		return '';
	}
}