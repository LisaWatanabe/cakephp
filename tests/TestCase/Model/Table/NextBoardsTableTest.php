<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NextBoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NextBoardsTable Test Case
 */
class NextBoardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NextBoardsTable
     */
    public $NextBoards;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NextBoards',
        'app.People'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NextBoards') ? [] : ['className' => NextBoardsTable::class];
        $this->NextBoards = TableRegistry::getTableLocator()->get('NextBoards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NextBoards);

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
}
