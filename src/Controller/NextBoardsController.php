<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component;

class NextBoardsController extends AppController {
    public function index() {
        $this->paginate = [
            'contain' => ['People']
        ];
        $nextBoards = $this->paginate($this->NextBoards);

        $this->set(compact('nextBoards'));
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Auth->allow(['add','index','show']);
    }


    public function view($id = null) {
        $nextBoard = $this->NextBoards->get($id, [
            'contain' => ['ParentNextBoards', 'People', 'ChildNextBoards']
        ]);

        $this->set('nextBoard', $nextBoard);
    }


    public function add()    {
        $nextBoard = $this->NextBoards->newEntity();
        if ($this->request->is('post')) {
            $nextBoard = $this->NextBoards->patchEntity($nextBoard, $this->request->getData());
            if ($this->NextBoards->save($nextBoard)) {
                $this->Flash->success(__('The next board has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
            $this->Flash->error(__('The next board could not be saved. Please, try again.'));
            }
        }
        $people = $this->NextBoards->People->find('list', ['limit' => 200]);
        $this->set('people',$people);
        $this->set('nextBoard',$nextBoard);
    }


    public function show($id = null) {
        if(empty($id)){
            $this->getTreeBoard(0);
        } else {
            $this->getTreeBoard($id);
        }
    }

    public function getTreeBoard($id) {
        if($id != 0) {
            $data = $this->NextBoards
            ->find()
            ->where(['NextBoards.id' => $id])
            ->contain(['People']);
            $this->set('data',$data);
            if(!empty($data)) {
                $child = $this->NextBoards
                ->find('children', ['for' => $id], false)
                ->find('threaded')
                ->contain(['People']);
                $this->set('child',$child);
            }
        } else {
            $query = $this->NextBoards->find('treeList', [
                'keyPath' => 'id',
                'valuePath' => 'title',
                'spacer' => '  '
            ]);
            $this->set('query',$query);
            $child = $this->NextBoards
            ->find()
            ->where(['parent_id' => 0])
            ->contain(['People']);
            $this->set('child',$child);
        }
    }

    public function edit($id = null)
    {
        $nextBoard = $this->NextBoards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nextBoard = $this->NextBoards->patchEntity($nextBoard, $this->request->getData());
            if ($this->NextBoards->save($nextBoard)) {
                $this->Flash->success(__('The next board has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The next board could not be saved. Please, try again.'));
        }
        $parentNextBoards = $this->NextBoards->ParentNextBoards->find('list', ['limit' => 200]);
        $people = $this->NextBoards->People->find('list', ['limit' => 200]);
        $this->set(compact('nextBoard', 'parentNextBoards', 'people'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nextBoard = $this->NextBoards->get($id);
        if ($this->NextBoards->delete($nextBoard)) {
            $this->Flash->success(__('The next board has been deleted.'));
        } else {
            $this->Flash->error(__('The next board could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
