<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\ORM\Behavior\Translate\TranslateTrait;

class Person extends Entity {
	use TranslateTrait;
	protected $_accessible = [
		'*' => true,
		'id' => false];
}










  ?>