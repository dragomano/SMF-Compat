<?php

if (! class_exists('curl_fetch_web_data', false)) {
    class curl_fetch_web_data
    {
        public function get_url_data(string $url, array|string $post_data = []): static
        {
            return $this;
        }
    }
}
