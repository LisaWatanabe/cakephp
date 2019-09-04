<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class NextBoardsTable extends Table {
    public function initialize(array $config) {
        parent::initialize($config);

        $this->addBehavior('Tree');
        $this->belongsTo('People');
    }

        // $this->setTable('next_boards');
        // $this->setDisplayField('title');
        // $this->setPrimaryKey('id');
        // $this->belongsTo('ParentNextBoards', [
        //     'className' => 'NextBoards',
        //     'foreignKey' => 'parent_id'
        // ]);
        // $this->belongsTo('People', [
        //     'foreignKey' => 'person_id'
        // ]);
        // $this->hasMany('ChildNextBoards', [
        //     'className' => 'NextBoards',
        //     'foreignKey' => 'parent_id'
        // ]);

    public function validationDefault(Validator $validator) {
        $validator
            ->integer('id')
            ->requirePresence('title')
            ->requirePresence('parent_id')
            ->requirePresence('person_id')
            ->notEmpty('title')
            ->requirePresence('content')
            ->notEmpty('content');
            // ->allowEmptyString('id', null, 'create');
        return $validator;
    }

    public function buildRules(RulesChecker $rules)  {
        $rules->add($rules->existsIn(['person_id'], 'People'));

        return $rules;
    }
}
