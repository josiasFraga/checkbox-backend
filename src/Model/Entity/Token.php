<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Token Entity
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property string $notification_id
 * @property string $plataforma
 * @property string $token
 * @property \Cake\I18n\FrozenDate $validade
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Notification $notification
 */
class Token extends Entity
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
        'usuario_id' => true,
        'notification_id' => true,
        'plataforma' => true,
        'token' => true,
        'validade' => true,
        'usuario' => true,
        'notification' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'token',
    ];
}
