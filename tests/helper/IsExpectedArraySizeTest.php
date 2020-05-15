<?php

namespace Tests\helper;

use PHPUnit\Framework\TestCase;

class IsExpectedArraySizeTest extends TestCase
{
    /**
     * A basic unit test.
     *
     * @return void
     */
    public function testBasic()
    {
        // Arrange
        $array = [3, 5, 2];
        $count = 3;
        // Act & Assert
        $this->assertTrue(isExpectedArraySize($array, $count));
    }

    public function testBasicFailure() {
        // Arrange
        $array = [3, 5, 2];
        $count = 2;
        // Act & Assert
        $this->assertFalse(isExpectedArraySize($array, $count));
    }
}
