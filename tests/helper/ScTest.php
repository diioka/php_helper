<?php

namespace Tests\helper;

use PHPUnit\Framework\TestCase;

class ScTest extends TestCase
{
    public function testBasic() {
        // Arrange & Act & Assert
        $this->assertTrue(sc("a", "a"));
    }

    public function testBasicFailure() {
        // Arrange & Act & Assert
        $this->assertFalse(sc("a", "b"));
    }
}
