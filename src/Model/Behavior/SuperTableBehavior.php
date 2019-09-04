<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\ORM\Query;


class SuperTableBehavior extends Behavior {
	public function initialize(array $config) {
	}

	public function anyData() {
		$count = $this->_table->find()->count();
		$n = mt_rand(0, $count - 1);
		$data = $this->_table->find()->offset($n)->first();
		return $data;
	}
	public function findSomething(Query $query, array $options) {
		$count = $query
		->where(["{$options['field']} like " => $options['value']])
		->count();
		$n = mt_rand(0,$count - 1);
		$data = $query
		->where(["{$options['field']} like " => $options['value']])
		->offset($n)
		->first();
		return $data;
	}
}













  ?>