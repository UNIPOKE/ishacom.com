<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * News Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $body
 * @property string $image_path1
 * @property string $image_path2
 * @property int $ranking
 * @property int $category_id
 * @property int $disease_id
 * @property int $staff_id
 * @property bool $delflag
 * @property string $delreason
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Disease $disease
 * @property \App\Model\Entity\Staff $staff
 */
class News extends Entity
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
        'title' => true,
        'description' => true,
        'body' => true,
        'image_path1' => true,
        'image_path2' => true,
        'ranking' => true,
        'category_id' => true,
        'disease_id' => true,
        'staff_id' => true,
        'delflag' => true,
        'delreason' => true,
        'created' => true,
        'modified' => true,
        'category' => true,
        'disease' => true,
        'staff' => true
    ];
}
