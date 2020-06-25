<?php

namespace Tests\helper;

use PHPUnit\Framework\TestCase;

class RgTest extends TestCase
{
    public function testBasic() {
        $result = [];
        foreach (rg(1, 5) as $i) {
            $result[] = $i;
        }
        self::assertEquals([1, 2, 3, 4, 5], $result);
    }

    public function testBasic2() {
        $value_result = [];
        $key_result = [];
        foreach (rg(10, 20, 2) as $key => $value) {
            $value_result[] = $value;
            $key_result[] = $key;
        }
        self::assertEquals([10, 12, 14, 16, 18, 20], $value_result);
        self::assertEquals([0, 1, 2, 3, 4, 5], $key_result);
    }
}
