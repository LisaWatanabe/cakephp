<?php
namespace App\Test\TestCase\Model\Entity;

use App\Model\Entity\Person;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Entity\Person Test Case
 */
class PersonTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Entity\Person
     */
    public $Person;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Person = new Person();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Person);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
