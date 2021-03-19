<?php

/**
 * This file contains the ConfigurationArrayAccessTest class.
 *
 * @package    Lunr\Core
 * @author     Heinz Wiesinger <heinz@m2mobi.com>
 * @copyright  2011-2018, M2Mobi BV, Amsterdam, The Netherlands
 * @license    http://lunr.nl/LICENSE MIT License
 */

namespace Lunr\Core\Tests;

use Lunr\Core\Configuration;

/**
 * This tests the ArrayAccess methods of the Configuration class.
 *
 * @depends    Lunr\Core\Tests\ConfigurationArrayConstructorTest::testConfig
 * @covers     Lunr\Core\Configuration
 */
class ConfigurationArrayAccessTest extends ConfigurationTest
{

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->setUpArray($this->construct_test_array());
    }

    /**
     * Test offsetExists() with existing values.
     *
     * @param mixed $offset Offset
     *
     * @dataProvider existingConfigPairProvider
     */
    public function testOffsetExists($offset)
    {
        $this->assertTrue($this->class->offsetExists($offset));
    }

    /**
     * Test offsetExists() with non existing values.
     *
     * @param mixed $offset Offset
     *
     * @dataProvider nonExistingConfigPairProvider
     */
    public function testOffsetDoesNotExist($offset)
    {
        $this->assertFalse($this->class->offsetExists($offset));
    }

    /**
     * Test offsetGet() with non existing values.
     *
     * @param mixed $offset Offset
     *
     * @dataProvider existingConfigPairProvider
     */
    public function testOffsetGetWithExistingOffset($offset)
    {
        $this->assertEquals($this->config[$offset], $this->class->offsetGet($offset));
    }

    /**
     * Test offsetGet() with non existing values.
     *
     * @param mixed $offset Offset
     *
     * @dataProvider nonExistingConfigPairProvider
     */
    public function testOffsetGetWithNonExistingOffset($offset)
    {
        $this->assertNull($this->class->offsetGet($offset));
    }

    /**
     * Test that offsetUnset() unsets the config value.
     */
    public function testOffsetUnsetDoesUnset(): void
    {
        $this->assertArrayHasKey('test1', $this->get_reflection_property_value('config'));

        $this->class->offsetUnset('test1');

        $this->assertArrayNotHasKey('test1', $this->get_reflection_property_value('config'));
    }

    /**
     * Test that offsetUnset sets $size_invalid to FALSE.
     */
    public function testOffsetUnsetInvalidatesSize(): void
    {
        $this->assertFalse($this->get_reflection_property_value('size_invalid'));

        $this->class->offsetUnset('test1');

        $this->assertTrue($this->get_reflection_property_value('size_invalid'));
    }

    /**
     * Test offsetSet() with a given offset.
     *
     * @depends Lunr\Core\Tests\ConfigurationConvertArrayToClassTest::testConvertArrayToClassWithMultidimensionalArrayValue
     */
    public function testOffsetSetWithGivenOffset(): void
    {
        $this->assertArrayNotHasKey('test4', $this->get_reflection_property_value('config'));

        $this->class->offsetSet('test4', 'Value');

        $value = $this->get_reflection_property_value('config');

        $this->assertArrayHasKey('test1', $value);
        $this->assertEquals('Value', $value['test4']);
    }

    /**
     * Test offsetSet() with a null offset.
     *
     * @depends Lunr\Core\Tests\ConfigurationConvertArrayToClassTest::testConvertArrayToClassWithMultidimensionalArrayValue
     */
    public function testOffsetSetWithNullOffset(): void
    {
        $this->assertArrayNotHasKey(0, $this->get_reflection_property_value('config'));

        $this->class->offsetSet(NULL, 'Value');

        $value = $this->get_reflection_property_value('config');

        $this->assertArrayHasKey(0, $value);
        $this->assertEquals('Value', $value[0]);
    }

    /**
     * Test that offsetSet sets $size_invalid to FALSE.
     */
    public function testOffsetSetInvalidatesSize(): void
    {
        $this->assertFalse($this->get_reflection_property_value('size_invalid'));

        $this->class->offsetSet('test5', 'Value');

        $this->assertTrue($this->get_reflection_property_value('size_invalid'));
    }

}

?>
