<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Config\Tests\Definition\Builder;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Builder\FloatNodeDefinition;
use Symfony\Component\Config\Definition\Builder\IntegerNodeDefinition;
<<<<<<< HEAD
use Symfony\Component\Config\Definition\Builder\IntegerNodeDefinition as NumericNodeDefinition;

class NumericNodeDefinitionTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You cannot define a min(4) as you already have a max(3)
     */
    public function testIncoherentMinAssertion()
    {
        $def = new NumericNodeDefinition('foo');
        $def->max(3)->min(4);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage You cannot define a max(2) as you already have a min(3)
     */
    public function testIncoherentMaxAssertion()
    {
        $node = new NumericNodeDefinition('foo');
        $node->min(3)->max(2);
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionMessage The value 4 is too small for path "foo". Should be greater than or equal to 5
     */
    public function testIntegerMinAssertion()
    {
=======

class NumericNodeDefinitionTest extends TestCase
{
    public function testIncoherentMinAssertion()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('You cannot define a min(4) as you already have a max(3)');
        $def = new IntegerNodeDefinition('foo');
        $def->max(3)->min(4);
    }

    public function testIncoherentMaxAssertion()
    {
        $this->expectException('InvalidArgumentException');
        $this->expectExceptionMessage('You cannot define a max(2) as you already have a min(3)');
        $node = new IntegerNodeDefinition('foo');
        $node->min(3)->max(2);
    }

    public function testIntegerMinAssertion()
    {
        $this->expectException('Symfony\Component\Config\Definition\Exception\InvalidConfigurationException');
        $this->expectExceptionMessage('The value 4 is too small for path "foo". Should be greater than or equal to 5');
>>>>>>> master
        $def = new IntegerNodeDefinition('foo');
        $def->min(5)->getNode()->finalize(4);
    }

<<<<<<< HEAD
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionMessage The value 4 is too big for path "foo". Should be less than or equal to 3
     */
    public function testIntegerMaxAssertion()
    {
=======
    public function testIntegerMaxAssertion()
    {
        $this->expectException('Symfony\Component\Config\Definition\Exception\InvalidConfigurationException');
        $this->expectExceptionMessage('The value 4 is too big for path "foo". Should be less than or equal to 3');
>>>>>>> master
        $def = new IntegerNodeDefinition('foo');
        $def->max(3)->getNode()->finalize(4);
    }

    public function testIntegerValidMinMaxAssertion()
    {
        $def = new IntegerNodeDefinition('foo');
        $node = $def->min(3)->max(7)->getNode();
        $this->assertEquals(4, $node->finalize(4));
    }

<<<<<<< HEAD
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionMessage The value 400 is too small for path "foo". Should be greater than or equal to 500
     */
    public function testFloatMinAssertion()
    {
=======
    public function testFloatMinAssertion()
    {
        $this->expectException('Symfony\Component\Config\Definition\Exception\InvalidConfigurationException');
        $this->expectExceptionMessage('The value 400 is too small for path "foo". Should be greater than or equal to 500');
>>>>>>> master
        $def = new FloatNodeDefinition('foo');
        $def->min(5E2)->getNode()->finalize(4e2);
    }

<<<<<<< HEAD
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     * @expectedExceptionMessage The value 4.3 is too big for path "foo". Should be less than or equal to 0.3
     */
    public function testFloatMaxAssertion()
    {
=======
    public function testFloatMaxAssertion()
    {
        $this->expectException('Symfony\Component\Config\Definition\Exception\InvalidConfigurationException');
        $this->expectExceptionMessage('The value 4.3 is too big for path "foo". Should be less than or equal to 0.3');
>>>>>>> master
        $def = new FloatNodeDefinition('foo');
        $def->max(0.3)->getNode()->finalize(4.3);
    }

    public function testFloatValidMinMaxAssertion()
    {
        $def = new FloatNodeDefinition('foo');
        $node = $def->min(3.0)->max(7e2)->getNode();
        $this->assertEquals(4.5, $node->finalize(4.5));
    }

<<<<<<< HEAD
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidDefinitionException
     * @expectedExceptionMessage ->cannotBeEmpty() is not applicable to NumericNodeDefinition.
     */
    public function testCannotBeEmptyThrowsAnException()
    {
        $def = new NumericNodeDefinition('foo');
=======
    public function testCannotBeEmptyThrowsAnException()
    {
        $this->expectException('Symfony\Component\Config\Definition\Exception\InvalidDefinitionException');
        $this->expectExceptionMessage('->cannotBeEmpty() is not applicable to NumericNodeDefinition.');
        $def = new IntegerNodeDefinition('foo');
>>>>>>> master
        $def->cannotBeEmpty();
    }
}
