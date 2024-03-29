<?php
namespace App\Controller;
	use Cake\ORM\TableRegistry;
	use Cake\Validation\Validator;
	use Cake\I18n\I18n;
	use Cake\Controller\Component;
	use Cake\Event\Event;


class BoardsController extends AppController {
	private $people;

	public $paginate = [
		'limit' => 5,
		'order' => ['id' => 'DESC'],
		'contain' => ['People']
	];
	public function initialize(){
		parent::initialize();
		$this->people = TableRegistry::get('People');
		$this->loadComponent('Paginator');
		$this->loadComponent('RequestHandler');
		$this->loadComponent('DataArray');
		// $this->loadComponent('Flash');
	}
	public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        I18n::locale('ja');
        $this->Auth->allow(['add','login', 'show','index']);
    }
	public function index(){
		$data = $this->Boards->find('all');
		// $data = $this->paginate($this->Boards);
		$this->set(compact('data'));
	}
	public function add(){
		if($this->request->isPost()){
			if(!$this->people->checkNameAndPass($this->request->data)){
				$this->Flash->error('名前かパスワードを確認ください。');
			} else {
				$res = $this->people->find()
				->where(['name'=>$this->request->data['name']])
				->andWhere(['password'=>$this->request->data['password']])
				->first();
				$board = $this->Boards->newEntity();
				$board->name = $this->request->data['name'];
				$board->title = $this->request->data['title'];
				$board->content = $this->request->data['content'];
				$board->person_id = $res['id'];
				if($this->Boards->save($board)){
					$this->redirect(['action'=>'index']);
				}
			}
		}
		$this->set('entity',$this->Boards->newEntity());
	}
	public function show($param = 0){
		$data = $this->Boards
		->find()
		->where(['Boards.id'=>$param])
		->contain(['People'])
		->first();
		$this->set('data',$data);
	}
	public function show2($param = 0){
		$data = $this->people->get($param);
		$this->set('data',$data);
	}
	public function edit($param=0){
		if($this->request->isPut()){
			$board = $this->Boards
			->find()
			->where(['Boards.id'=>$param])
			->contain(['People'])
			->first();
			$board->title = $this->request->data['title'];
			$board->content = $this->request->data['content'];
			$board->person_id = $this->request->data[('person_id')];
			if(!$this->people->checkNameAndPass($this->request->data)){
				$this->Flash->error('名前かパスワードを確認ください。');
			} else {
				if($this->Boards->save($board)){
					$this->redirect(['action'=>'index']);
				}
			}
		} else {
			$board = $this->Boards
			->find()
			->where(['Boards.id'=>$param])
			->contain(['People'])
			->first();
		}
		$this->set('entity',$board);
	}
}












 ?>
