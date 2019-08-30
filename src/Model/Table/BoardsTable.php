<?php
// 	namespace App\Model\Table;
// 	use Cake\ORM\Table;
// 	class BoardsTable extends Table{
// 	}
namespace App\Model\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
// use Cake\Event\Event;
class BoardsTable extends Table {
	public function initialize(array $config){
		$this->belongsTo('People');
	}
	public function validationDefault(Validator $validator){
		$validator
			->integer('id');
		$validator
			->notEmpty('name', '必須項目です。');
		$validator
			->notEmpty('title', '必須項目です。');
		$validator
			->notEmpty('content', '必須項目です。');
		$validator
			->add('name','maxRecords',
			[
				'rule' => ['maxRecords', 'name',5],
				'message' => __('最大数を超えています'),
				'provider' => 'table',
			]);
		return $validator;
	}
	// public function maxRecords($data,$field,$num){
	// 	$n = $this->find()
	// 	->where([$field=>$data])
	// 	->count();
	// return $n < $num ? true : false;
	// }
	// public function buildRules(RulesChecker $rules){
	// 	$rules->add($rules->isUnique(['name'],'すでに登録済みです。'));
	// 	return $rules;
	// }
}
	// public $qdata = null;
	// public function beforeSave(Event $event, EntityInterface
	// 	$entity, $options){
	// 	$n = $this->find('all',['conditions'=>['name'=>$entity->name]])
	// 	->count();
	// 	if($n == 0){
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
		// $query->order(['name'=>'ASC']);
		// $qstr = '';
		// for ($i = 0;$i < count($event->data);$i++) {
		// 	$qstr .= $event->data[0]->sql() . '<br>\n';
		// }
		// $this->qdata = $qstr;
		// $query = $event->data[0];
		// $this->qdata = $query->sql();
	// }
	// public static function defaultConnectionName(){
	// return 'default2';
// }


  ?>