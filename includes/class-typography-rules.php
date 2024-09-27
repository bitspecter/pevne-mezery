<?php

namespace BitSpecter\PevneMezery;

class TypographyRules
{
    // Single-character prepositions and conjunctions
    public static $single_char_words = array('k', 's', 'v', 'z', 'o', 'u', 'a', 'i');

    // Abbreviations and fixed phrases
    public static $abbreviations = array(
        'j\. č\.',
        'mn\. č\.',
        'n\. l\.',
        'př\. n\. l\.',
        'č\. p\.',
        't\. r\.',
        't\. č\.',
        'v\. r\.',
        'n\. m\.',
        'tj\.',
        'tzv\.',
        's\.',
        'č\.',
        'r\. o\.',
        's\. r\. o\.',
        'a\. s\.',
        'k\. s\.',
        'v\. o\. s\.',
        'F\. X\.',
    );

    // Academic and military titles
    public static $titles = array(
        'Bc\.',
        'BcA\.',
        'Ing\.',
        'Ing\. arch\.',
        'Mgr\.',
        'MgA\.',
        'JUDr\.',
        'PhDr\.',
        'RNDr\.',
        'PharmDr\.',
        'MVDr\.',
        'ThLic\.',
        'ThDr\.',
        'ThMgr\.',
        'Th\.D\.',
        'PaedDr\.',
        'CSc\.',
        'DrSc\.',
        'Ph\.D\.',
        'Dr\.',
        'doc\.',
        'prof\.',
        'MDDr\.',
        'voj\.',
        'čet\.',
        'rtm\.',
        'por\.',
        'npor\.',
        'kpt\.',
        'mjr\.',
        'pplk\.',
        'plk\.',
        'gen\.',
        'MBA',
        'LL\.M\.',
        'LL\.B\.',
        'DBA',
        'BBA'
    );

    // Units for numerical data
    public static $units = array(
        'h',
        'h\.',
        'min',
        's',
        'ms',
        'm',
        'km',
        'cm',
        'mm',
        'ha',
        'km²',
        'MB',
        'GB',
        'm/s',
        'km/h',
        '°',
        '°C',
        '°F',
        'Kč',
        '€',
        '\$',
        '%'
    );

    // Mathematical operators
    public static $operators = array(
        '\+',
        '\-',
        '×',
        '÷',
        '=',
        '≠',
        '≈',
        '<',
        '>',
        '≤',
        '≥',
        '~'
    );

    // Special symbols
    public static $symbols = array(
        '§',     // Section sign
        '\*',    // Asterisk
        '†',     // Dagger
        '‡',     // Double Dagger
        '©',     // Copyright
        '®',     // Registered Trademark
        '℗',     // Sound Recording Copyright
        '‰',     // Per Mille
        '™',     // Trademark
        '℠',     // Service Mark
        '–',     // En-dash
        '—',     // Em-dash
        '→',     // Right arrow
        '←',     // Left arrow
        '↑',     // Up arrow
        '↓',     // Down arrow
        '€',     // Euro
        '£',     // British Pound
        '\$',    // Dollar
        '¥',     // Yen
        '¢',     // Cent
        '°',     // Degree
        '±',     // Plus-minus
        '∞',     // Infinity
        '≠',     // Not equal
        '≤',     // Less than or equal to
        '≥',     // Greater than or equal to
        '∑',     // Summation
        '∏',     // Product
        '√',     // Square root
        '≈',     // Approximately equal
        '∂',     // Partial derivative
        'Ω',     // Ohm symbol (Omega)
        'µ'      // Micro
    );
}
