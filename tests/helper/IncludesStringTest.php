<?php

namespace Tests\helper;

use PHPUnit\Framework\TestCase;

class IncludesStringTest extends TestCase
{
    /**
     * A basic unit test.
     *
     * @return void
     */
    public function testBasic()
    {
        // Arrange
        $haystack = 'abcdefg';
        $needle = 'cde';
        // Act & Assert
        $this->assertTrue(includesString($haystack, $needle));
    }

    public function testBasicFailure() {
        // Arrange
        $haystack = 'abcdefg';
        $needle = 'xyz';
        // Act & Assert
        $this->assertFalse(includesString($haystack, $needle));
    }
}
