<?php

/**
 * 文字列の比較を行う関数
 * This is a function to compare strings.
 * @param string $str1
 * @param string $str2
 * @return bool
 */
function sc(string $str1, string $str2): bool {
    if (strcmp($str1, $str2) === 0) return true;
    return false;
}

/**
 * 日付の書式が期待通りかを判定する関数
 * This is the function to check if the date format is as expected.
 * @param string $date
 * @param string $format
 * @return bool
 */
function isExpectedDateFormat(string $date, $format = 'Y-m-d H:i:s'): bool {
    $d = DateTime::createFromFormat($format, $date);
    return $d && sc($d->format($format), $date);
}

/**
 * 配列のサイズが期待通りかを判定する関数
 * This is the function that determines whether the size of the array is as expected.
 * @param array $array
 * @param int $size
 * @return bool
 */
function isExpectedArraySize(array $array, int $size): bool {
    if (count($array) === $size) return true;
    return false;
}

/**
 * 文字列が含まれているかを判定する関数
 * This is the function to determine if a string is included.
 * @param string $haystack
 * @param string $needle
 * @return bool
 */
function includesString(string $haystack, string $needle): bool {
    if (strpos($haystack, $needle) !== false) return true;
    return false;
}
