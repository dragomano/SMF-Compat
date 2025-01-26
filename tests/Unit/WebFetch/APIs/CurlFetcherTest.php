<?php declare(strict_types=1);

use Bugo\Compat\WebFetch\APIs\CurlFetcher;

beforeEach(function () {
    $this->fetcher = new CurlFetcher();
});

test('__constructor method', function () {
    expect($this->fetcher)->toBeInstanceOf(CurlFetcher::class);
});

test('request method', function () {
    expect($this->fetcher->request('https://foo.bar'))->toBeObject();
});
