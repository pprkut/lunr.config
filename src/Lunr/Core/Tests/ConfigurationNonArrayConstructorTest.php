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
        $this->assertEmpty($this->get_reflection_property_value('config'));
    }

    /**
     * Test that the internal position pointer is initially zero.
     */
    public function testPositionIsZero(): void
    {
        $this->assertPropertyEquals('position', 0);
    }

    /**
     * Test that the initial size value is cached.
     */
    public function testSizeInvalidIsFalse(): void
    {
        $this->assertPropertySame('size_invalid', FALSE);
    }

    /**
     * Test that the initial size value is zero.
     */
    public function testSizeIsZero(): void
    {
        $this->assertPropertyEquals('size', 0);
    }

}

?>
