<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductCategory Entity
 *
 * @property int $id
 * @property string|null $category_name
 * @property string|null $status
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime|null $modified_date
 */
class ProductCategory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'category_name' => true,
        'status' => true,
        'created_date' => true,
        'modified_date' => true,
        'users_id'=>true,
    ];
}
