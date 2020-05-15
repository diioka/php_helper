<?php

namespace Tests\helper;

use PHPUnit\Framework\TestCase;

class IsExpectedDateFormatTest extends TestCase
{
    /**
     * A basic unit test.
     *
     * @return void
     */
    public function testBasic()
    {
        // Arrange
        $date = '2020-01-26 00:00:00';
        // Act & Assert
        $this->assertTrue(isExpectedDateFormat($date));
    }

    public function testBasicFailure()
    {
        // Arrange
        $date = '2020-01-26 00:00:00';
        $format = 'Y/m/d H:i:s';
        // Act & Assert
        $this->assertFalse(isExpectedDateFormat($date, $format));
    }
}
