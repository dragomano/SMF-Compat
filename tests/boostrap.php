<?php

use Bugo\Compat\{Config, Lang, Utils};

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
	function checkSession(): string
	{
		return '';
	}
}

if (! function_exists('isAllowedTo')) {
	function isAllowedTo(string|array $permission): bool
	{
		return $permission === 'foo_bar';
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
	function loadLanguage(string $lang): void
	{
		Lang::$txt['foo'] = $lang;
	}
}

if (! function_exists('sentence_list')) {
	function sentence_list(array $sentence): string
	{
		return implode(',', $sentence);
	}
}

if (! function_exists('parse_bbc')) {
	function parse_bbc(string $string): string
	{
		return $string;
	}
}

if (! function_exists('cache_get_data')) {
	function cache_get_data(string $key): mixed
	{
		return Utils::$context['tmp'][$key] ?? null;
	}
}

if (! function_exists('cache_put_data')) {
	function cache_put_data(string $key, mixed $value): void
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
