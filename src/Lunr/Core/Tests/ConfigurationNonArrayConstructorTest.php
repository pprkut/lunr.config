<?php

/**
 * This file contains the ConfigurationNonArrayConstructorTest
 * class.
 *
 * @package    Lunr\Core
 * @author     Heinz Wiesinger <heinz@m2mobi.com>
 * @copyright  2011-2018, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Core\Tests;

use Lunr\Core\Configuration;

/**
 * Basic tests for the Configuration class,
 * when initialized with a non-array value.
 *
 * @covers     Lunr\Core\Configuration
 */
class ConfigurationNonArrayConstructorTest extends ConfigurationTest
{

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->setUpNonArray();
    }

    /**
     * Test that the internal config storage is initially empty.
     */
    public function testConfigIsEmpty(): void
    {
        $property = $this->configuration_reflection->getProperty('config');
        $property->setAccessible(TRUE);
        $this->assertEmpty($property->getValue($this->configuration));
    }

    /**
     * Test that the internal position pointer is initially zero.
     */
    public function testPositionIsZero(): void
    {
        $property = $this->configuration_reflection->getProperty('position');
        $property->setAccessible(TRUE);
        $this->assertEquals(0, $property->getValue($this->configuration));
    }

    /**
     * Test that the initial size value is cached.
     */
    public function testSizeInvalidIsFalse(): void
    {
        $property = $this->configuration_reflection->getProperty('size_invalid');
        $property->setAccessible(TRUE);
        $this->assertFalse($property->getValue($this->configuration));
    }

    /**
     * Test that the initial size value is zero.
     */
    public function testSizeIsZero(): void
    {
        $property = $this->configuration_reflection->getProperty('size');
        $property->setAccessible(TRUE);
        $this->assertEquals(0, $property->getValue($this->configuration));
    }

}

?>
