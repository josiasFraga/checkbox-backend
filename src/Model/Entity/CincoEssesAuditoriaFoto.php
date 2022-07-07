<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CincoEssesAuditoriaFoto Entity
 *
 * @property int $id
 * @property int $auditoria_id
 * @property string $foto
 *
 * @property \App\Model\Entity\CincoEssesAuditorium $cinco_esses_auditorium
 */
class CincoEssesAuditoriaFoto extends Entity
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
        'auditoria_id' => true,
        'foto' => true,
        'cinco_esses_auditorium' => true,
    ];
}
