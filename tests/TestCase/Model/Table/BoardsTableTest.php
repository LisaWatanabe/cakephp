<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardsTable Test Case
 */
class BoardsTableTest extends TestCase
{
    public $BoardsTable;
    public $fixtures = [
        'app.Boards',
        'app.People'
    ];
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boards') ? [] : ['className' => BoardsTable::class];
        $this->BoardsTable = TableRegistry::getTableLocator()->get('Boards', $config);
    }

    public function tearDown()
    {
        unset($this->BoardsTable);
        parent::tearDown();
    }
    public function testInitialize()
    {
    }
    public function testValidationDefault()
    {
    }
    public function testBoardsTableFind(){
        $result = $this->BoardsTable->find('all')->first();
        $this->assertFalse(empty($result));
        $this->assertTrue(is_a($result,'App\Model\Entity\Board'));
        $this->assertEquals($result->id, 1001);
        $this->assertStringStartsWith('test title 1', $result->title);
    }
}
