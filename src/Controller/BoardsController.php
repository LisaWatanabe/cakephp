<?php
	// namespace App\Controller;
	// class BoardsController extends AppController {
	// 	public function index(){
	// 		$data = $this->Boards->find('all');
	// 		$this->set('data',$data);
	// 	}
	// }
namespace App\Controller;
	use Cake\Exception;
	use Cake\Log\Log;
	use Cake\Datasource\ConnectionManager;
	use Cake\Validation\Validator;

class BoardsController extends AppController {
	public function index($id = null){
		$data = $this->Boards
		->find('all')
		->contain('People');
		// if (!$this->request->is('post')) {
			// $connection = ConnectionManager::get('default');
			// $input = $this->request->data['input'];
			// $data = $connection
			// ->execute('SELECT * FROM boards')
			// ->fetchAll('assoc');
			// ->find()
			// ->where(function($exp, $q)use($input){
				// return $exp->eq('id',$input);
			// });
		// } else{
		// 	$input = $this->request->data['input'];
		// 	$connection = ConnectionManager::get('default');
		// 	$data = $connection
		// 	->execute('SELECT * FROM boards where id = :id',
		// 		['id'=>$input])
		// 	->fetchAll('assoc');
		// }
		$this->set('data',$data);
		// $this->set('entity',$this->Boards->newEntity());
		// $data = $this->Boards->get('Pon');
		// $this->set('data',$data);
		// if ($id != null){
		// 	try {
		// 		$entity = $this->Boards->get($id);
		// 		$this->set('entity',$entity);
		// 	} catch(Exception $e){
		// 		Log::write('debug', $e->getMessage());
		// 	}
		// }
		// if ($this->request->is('post')) {
			// $id = $this->request->data['id'];
			// $data = $this->Boards->findByIdOrName($id, $id);
			// $data = $this->Boards->find('all', ['conditions'=>['name like' => "%{$this->request->data['name']}%"
		// ]
	// ]);
		// } else {
		// $data = $this->Boards->find('all')->order(['id'=>'DESC']);
		// }
		// $this->set('data',$data);
		// $data->order(['name'=>'ASC','id'=>'DESC']);
		// $this->set('data',$data->toArray());
		// $this->set('qdata',$this->Boards->qdata);
		// $this->set('count',$data->count());
		// $this->set('min',$data->min('id'));
		// $this->set('max',$data->max('id'));
		// $this->set('first',$data->first()->toArray());
	}
	public function editRecord(){
		if ($this->request->is('post')){
			$arr1 = ['name'=>$this->request->data['name']];
			$arr2 = ['title'=>$this->request->data['title']];
			$this->Boards->updateAll($arr2, $arr1);
			// try {
				// $entity = $this->Boards->get($this->request->data['id']);
				// $entity->content = $this->request->data['content'];
				// $this->Boards->patchEntity($entity, $this->request->data);
				// $this->Boards->save($entity);
			// } catch(Exception $e){
			// 	Log::write('debug', $e->getMessage());
			// }
		}
		return $this->redirect(['action'=>'index']);
	}

	public function addRecord(){
		if ($this->request->is('post')){
			$board = $this->Boards->newEntity($this->request->data);
			$validator = new Validator();
			// $validator->email('name');
			$validator->add('content','custom',[
				'rule'=>['custom',"/\A\d+\z/"],
				'message'=> '整数を入力してください。'
			]);
			$errors = $validator->errors($this->request->data);
			if (!empty($errors)){
				$this->Flash->error('EMAIL ERROR!!');
			} else {
				if ($this->Boards->save($board)) {
					$this->redirect(['action'=>'index']);
				}
			}
			$this->set('entity',$board);
		}
		// return $this->redirect(['action'=>'index']);
		// $this->autoRender =false;
		// echo "<pre>";
		// print_r($this->request->data);
		// echo "</pre>";
		// return $this->redirect(['action'=>'index']);
	}


	public function delRecord(){
	if ($this->request->is('post')) {
		// try {
			// $entity = $this->Boards->get($this->request->data['id']);
			$this->Boards->deleteAll(
				['name'=>$this->request->data['name']]
			);
		// } catch(Exception $e) {
			// Log::write('debug',$e->getMessage());
		}
		$this->redirect(['action' => 'index']);
	}
}
// }












 ?>
