<?php

namespace Ebranvo\Util;

final class Json {

    /**
     * Encode an array into a json string
     *
     * @param  array $content
     *
     * @return string
     */
    public static function encode(array $content): string {
        return json_encode($content, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Decode a json string into an array
     *
     * @param  string $json
     *
     * @return array
     */
    public static function decode(string $json): array {
        return json_decode($json, true);
    }
}