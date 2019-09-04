<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * NextBoard Entity
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $person_id
 * @property string|null $title
 * @property string|null $content
 * @property int|null $lft
 * @property int|null $rght
 *
 * @property \App\Model\Entity\ParentNextBoard $parent_next_board
 * @property \App\Model\Entity\Person $person
 * @property \App\Model\Entity\ChildNextBoard[] $child_next_boards
 */
class NextBoard extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'parent_id' => true,
        'person_id' => true,
        'title' => true,
        'content' => true,
        'lft' => true,
        'rght' => true,
        'parent_next_board' => true,
        'person' => true,
        'child_next_boards' => true
    ];
}
