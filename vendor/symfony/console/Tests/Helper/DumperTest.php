<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Helper;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Helper\Dumper;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\Test\VarDumperTestTrait;

class DumperTest extends TestCase
{
    use VarDumperTestTrait;

<<<<<<< HEAD
    public static function setUpBeforeClass()
=======
    public static function setUpBeforeClass(): void
>>>>>>> master
    {
        putenv('DUMP_LIGHT_ARRAY=1');
        putenv('DUMP_COMMA_SEPARATOR=1');
    }

<<<<<<< HEAD
    public static function tearDownAfterClass()
=======
    public static function tearDownAfterClass(): void
>>>>>>> master
    {
        putenv('DUMP_LIGHT_ARRAY');
        putenv('DUMP_COMMA_SEPARATOR');
    }

    /**
     * @dataProvider provideVariables
     */
    public function testInvoke($variable)
    {
<<<<<<< HEAD
        $dumper = new Dumper($this->getMockBuilder(OutputInterface::class)->getMock());
=======
        $output = $this->getMockBuilder(OutputInterface::class)->getMock();
        $output->method('isDecorated')->willReturn(false);

        $dumper = new Dumper($output);
>>>>>>> master

        $this->assertDumpMatchesFormat($dumper($variable), $variable);
    }

    public function provideVariables()
    {
        return [
            [null],
            [true],
            [false],
            [1],
            [-1.5],
            ['string'],
            [[1, '2']],
            [new \stdClass()],
        ];
    }
}
