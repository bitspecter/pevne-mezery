<?php

namespace BitSpecter\PevneMezery;

class ContentHandler
{
    /**
     * Main function to process the content and apply typographical rules.
     *
     * @param string $content The original content.
     * @return string The processed content.
     */
    public static function process_content(string $content): string
    {
        // Dynamically apply all typographical rules from the configuration
        foreach (self::get_typography_rules() as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        return $content;
    }

    /**
     * Defines the patterns and replacements for the typographical rules.
     * Returns an associative array where keys are regex patterns and values are replacements.
     *
     * @return array The array of typographical rules.
     */
    private static function get_typography_rules(): array
    {
        return [
            // Titles (academic, military, etc.)
            '/\b(' . implode('|', TypographyRules::$titles) . ')\s+([A-Z][a-zá-ž]+)/u' => '$1&nbsp;$2',

            // Abbreviations
            ...array_combine(
                array_map(fn($abbr) => '/\b' . preg_quote($abbr, '/') . '\b/u', TypographyRules::$abbreviations), // Properly escape regex characters
                array_map(fn($abbr) => str_replace('.', '.&nbsp;', $abbr), TypographyRules::$abbreviations)
            ),

            // Single-character prepositions and conjunctions
            '/\b(' . implode('|', array_map(fn($word) => preg_quote($word, '/'), TypographyRules::$single_char_words)) . ')\s+/iu' => '$1&nbsp;',

            // Mathematical operators
            '/(\d+)\s*(' . implode('|', array_map(fn($op) => preg_quote($op, '/'), TypographyRules::$operators)) . ')\s*(\d+)/u' => '$1&nbsp;$2&nbsp;$3',

            // Units of measurement
            '/(\d+)\s+(' . implode('|', array_map(fn($unit) => preg_quote($unit, '/'), TypographyRules::$units)) . ')\b/u' => '$1&nbsp;$2',

            // Special symbols
            '/(' . implode('|', array_map(fn($symbol) => preg_quote($symbol, '/'), TypographyRules::$symbols)) . ')\s+/u' => '$1&nbsp;',

            '/\s*([—–])\s*/u' => '&nbsp;$1&nbsp;',
        ];
    }
}
