<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Category Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $lead
 * @property string $image_path
 * @property int $ranking
 * @property int $staff_id
 * @property bool $delflag
 * @property string $delreazon
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Staff $staff
 * @property \App\Model\Entity\Disease[] $diseases
 * @property \App\Model\Entity\News[] $news
 * @property \App\Model\Entity\Question[] $questions
 */
class Category extends Entity
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
        'name' => true,
        'description' => true,
        'lead' => true,
        'image_path' => true,
        'ranking' => true,
        'staff_id' => true,
        'delflag' => true,
        'delreazon' => true,
        'created' => true,
        'modified' => true,
        'staff' => true,
        'diseases' => true,
        'news' => true,
        'questions' => true
    ];
}
