<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BoardsController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
// use Cake\TestSuite\IntegrationTestTrait;
// use Cake\TestSuite\TestCase;

class BoardsControllerTest extends IntegrationTestCase {

    public $fixtures = [
        'app.Boards',
        'app.People'
    ];

    public function testIndex() {
        $this->get('/boards');
        $this->assertResponseOk();
    }

    public function testShow() {
        $this->get('/boards/show/1');
        $this->assertResponseOk();
    }

    public function testAdd(){
        $data = [
            'name' => 'test name 1',
            'password' => 'test password 1',
            'title' => 'test new title 1',
            'content' => 'test new content 1'
        ];
        $this->post('/boards/add', $data);

        $this->assertResponseSuccess();
        // $this->assertResponseOk();
        $boards = TableRegistry::get('Boards');
        $query = $boards->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $query->count());
    }

}


// namespace App\Test\TestCase\Controller;


// class BoardsControllerTest extends IntegrationTestCase {
//     public $fixtures = [
//         'app.Boards',
//         'app.People'
//     ];
//     public function testIndex() {
//         $this->get('/boards');
//         $this->assertResponseOk();
//     }

//     public function testShow() {
//         $this->get('/boards/show/1');
//         $this->assertResponseOk();
//     }

//     public function testAddPost() {
//         $data = [
//             'name' => 'test name 1',
//             'password' => 'test password 1',
//             'title' => 'test new title 1',
//             'content' => 'test new content 1',
//         ];
//         $this->post('/boards/add',$data);

//         $this->assertResponseSuccess();
//         $boards = TableRegistry::get('Boards');
//         $query = $boards->find()->where(['title' => $data['title']]);
//         $this->assertEquals(1, $query->count());
//     }

    // public function testShow2()
    // {
    //     $this->markTestIncomplete('Not implemented yet.');
    // }
    // public function testEdit()
    // {
    //     $this->markTestIncomplete('Not implemented yet.');
    // }

?>