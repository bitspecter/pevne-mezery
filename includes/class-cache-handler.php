<?php

namespace BitSpecter\PevneMezery;

class CacheHandler
{
    const CACHE_DURATION = 12 * HOUR_IN_SECONDS;

    public static function get_cached_content(string $content): ?string
    {
        $cache_key = 'fs_fixed_spaces_' . md5($content);

        return get_transient($cache_key);
    }

    public static function save_cached_content(string $content): void
    {
        $cache_key = 'fs_fixed_spaces_' . md5($content);
        set_transient($cache_key, $content, self::CACHE_DURATION);
    }
}
