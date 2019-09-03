<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tests\Command;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Tester\CommandTester;

class HelpCommandTest extends TestCase
{
    public function testExecuteForCommandAlias()
    {
        $command = new HelpCommand();
        $command->setApplication(new Application());
        $commandTester = new CommandTester($command);
        $commandTester->execute(['command_name' => 'li'], ['decorated' => false]);
<<<<<<< HEAD
        $this->assertContains('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
        $this->assertContains('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
        $this->assertContains('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
=======
        $this->assertStringContainsString('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
        $this->assertStringContainsString('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
        $this->assertStringContainsString('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command alias');
>>>>>>> master
    }

    public function testExecuteForCommand()
    {
        $command = new HelpCommand();
        $commandTester = new CommandTester($command);
        $command->setCommand(new ListCommand());
        $commandTester->execute([], ['decorated' => false]);
<<<<<<< HEAD
        $this->assertContains('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertContains('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertContains('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
=======
        $this->assertStringContainsString('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertStringContainsString('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertStringContainsString('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
>>>>>>> master
    }

    public function testExecuteForCommandWithXmlOption()
    {
        $command = new HelpCommand();
        $commandTester = new CommandTester($command);
        $command->setCommand(new ListCommand());
        $commandTester->execute(['--format' => 'xml']);
<<<<<<< HEAD
        $this->assertContains('<command', $commandTester->getDisplay(), '->execute() returns an XML help text if --xml is passed');
=======
        $this->assertStringContainsString('<command', $commandTester->getDisplay(), '->execute() returns an XML help text if --xml is passed');
>>>>>>> master
    }

    public function testExecuteForApplicationCommand()
    {
        $application = new Application();
        $commandTester = new CommandTester($application->get('help'));
        $commandTester->execute(['command_name' => 'list']);
<<<<<<< HEAD
        $this->assertContains('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertContains('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertContains('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
=======
        $this->assertStringContainsString('list [options] [--] [<namespace>]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertStringContainsString('format=FORMAT', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertStringContainsString('raw', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
>>>>>>> master
    }

    public function testExecuteForApplicationCommandWithXmlOption()
    {
        $application = new Application();
        $commandTester = new CommandTester($application->get('help'));
        $commandTester->execute(['command_name' => 'list', '--format' => 'xml']);
<<<<<<< HEAD
        $this->assertContains('list [--raw] [--format FORMAT] [--] [&lt;namespace&gt;]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertContains('<command', $commandTester->getDisplay(), '->execute() returns an XML help text if --format=xml is passed');
=======
        $this->assertStringContainsString('list [--raw] [--format FORMAT] [--] [&lt;namespace&gt;]', $commandTester->getDisplay(), '->execute() returns a text help for the given command');
        $this->assertStringContainsString('<command', $commandTester->getDisplay(), '->execute() returns an XML help text if --format=xml is passed');
>>>>>>> master
    }
}
