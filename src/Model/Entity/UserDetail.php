<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserDetail Entity
 *
 * @property int $id
 * @property int $users_id
 * @property string $address
 * @property string $bank
 * @property \Cake\I18n\FrozenTime $created_date
 * @property \Cake\I18n\FrozenTime $modified_date
 *
 * @property \App\Model\Entity\User $user
 */
class UserDetail extends Entity
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
        'users_id' => true,
        'address' => true,
        'bank' => true,
        'created_date' => true,
        'modified_date' => true,
        'users' => true,
    ];
}
