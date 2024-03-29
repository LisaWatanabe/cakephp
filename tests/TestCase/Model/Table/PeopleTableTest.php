<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PeopleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PeopleTable Test Case
 */
class PeopleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PeopleTable
     */
    public $PeopleTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.People',
        'app.Boards'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('People') ? [] : ['className' => PeopleTable::class];
        $this->PeopleTable = TableRegistry::getTableLocator()->get('People', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PeopleTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test checkNameAndPass method
     *
     * @return void
     */
    public function testCheckNameAndPass()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
