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

/**
 * foreachで使用可能なrange関数
 * This is a range function that can be used with foreach.
 * @param int $start
 * @param int $end
 * @param int $step
 * @return Range
 */
function rge(int $start, int $end, int $step = 1) {
    return new Range($start, $end, $step);
}

/**
 * Class Range
 */
class Range implements Iterator {

    /** @var int $start */
    private $start;

    /** @var int $end */
    private $end;

    /** @var int $step */
    private $step;

    /** @var $key */
    private $key;

    /** @var $current */
    private $current;

    public function __construct(int $start, int $end, int $step = 1)
    {
        $this->start = $start;
        $this->end   = $end;
        $this->step  = $step;
    }

    public function rewind()
    {
        $this->key     = 0;
        $this->current = $this->start;
    }

    public function next()
    {
        $this->key += 1;
        $this->current += $this->step;
    }

    public function key()
    {
        return $this->key;
    }

    public function current()
    {
        return $this->current;
    }

    public function valid()
    {
        return $this->current() <= $this->end;
    }
}

/**
 * foreachで使用可能な高速なrange関数
 * This is a fast range function that can be used with foreach.
 * @param int $start
 * @param int $end
 * @param int $step
 * @return Generator
 */
function rg(int $start, int $end, $step = 1) {
    if ($start <= $end) {
        if ($step <= 0) {
            throw new LogicException('Step must be positive');
        }
        for ($i = $start; $i <= $end; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be negative');
        }
        for ($i = $start; $i >= $end; $i += $step) {
            yield $i;
        }
    }
}

/**
 * 改行コード付きで文字列を出力する関数
 * This function outputs a string with a line feed code.
 * @param $string
 */
function echoln($string) {
    echo($string.PHP_EOL);
}

/**
 * ディレクトリを再起的に削除する関数
 * 参考: https://www.sejuku.net/blog/78776
 * @param string $dir
 * @return bool
 */
function rmdirRF($dir) {
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        if (is_dir("$dir/$file")) {
            rmdirRF("$dir/$file");
        } else {
            unlink("$dir/$file");
        }
    }
    return rmdir($dir);
}
