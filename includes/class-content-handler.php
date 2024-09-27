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
        // First, apply simple replacements using str_replace for better performance
        $content = self::apply_simple_replacements($content);

        // Then, apply more complex replacements using regular expressions
        foreach (self::get_regex_rules() as $pattern => $replacement) {
            $content = preg_replace($pattern, $replacement, $content);
        }

        return $content;
    }

    /**
     * Applies simple replacements using str_replace where applicable.
     *
     * @param string $content The content to process.
     * @return string The processed content with simple replacements applied.
     */
    private static function apply_simple_replacements(string $content): string
    {
        // Use str_replace for abbreviations, titles and fixed phrases
        $search = [
            'Bc.',
            'Mgr.',
            'Ing.',
            'Ph.D.',
            'LL.B.',
            'MUDr.',
            'JUDr.',
            'prof.',
            'voj.',
            'čet.',
            'rtm.',
            'por.',
            'kpt.',
            'plk.',
            'gen.',
            'Dr.',
            'doc.',
            'cca.',
            'č.',
            'čís.',
            'čj.',
            'čp.',
            'fa',
            'fě',
            'fy',
            'kupř.',
            'mj.',
            'např.',
            'p.',
            'pí',
            'popř.',
            'př.',
            'přib.',
            'přibl.',
            'sl.',
            'str.',
            'sv.',
            'tj.',
            'tzn.',
            'tzv.',
            'zvl.'
        ];

        $replace = array_map(fn($abbr) => str_replace('.', '.&nbsp;', $abbr), $search);

        // Additional replacements for dashes
        $search = array_merge($search, [' - ', ' – ', ' — ']);
        $replace = array_merge($replace, ['&nbsp;-&nbsp;', '&nbsp;–&nbsp;', '&nbsp;—&nbsp;']);

        return str_replace($search, $replace, $content);
    }

    /**
     * Defines the patterns and replacements for the typographical rules.
     * Returns an associative array where keys are regex patterns and values are replacements.
     *
     * @return array The array of regex rules.
     */
    private static function get_regex_rules(): array
    {
        // Using combined regex for similar rules and more efficient replacements
        return [
            // Single-character prepositions and conjunctions
            '/\b(k|s|v|z|o|u|a|i)\s+/iu' => '$1&nbsp;',

            // Mathematical operators
            '/(\d+)\s*(\+|\-|×|÷|=|≠|≈|<|>|≤|≥|~)\s*(\d+)/u' => '$1&nbsp;$2&nbsp;$3',

            // Units of measurement
            '/(\d+)\s*(h|min|s|ms|m|km|cm|mm|ha|km²|MB|GB|m\/s|km\/h|°|°C|°F|Kč|€|\$|%)/u' => '$1&nbsp;$2',

            // Special symbols
            '/(§|\*|†|‡|©|®|℗|‰|™|℠|–|—|→|←|↑|↓|€|£|\$|¥|¢|°|±|∞|≠|≤|≥|∑|∏|√|≈|∂|Ω|µ)\s+/u' => '$1&nbsp;',
        ];
    }
}
