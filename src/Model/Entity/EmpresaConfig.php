<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmpresaConfig Entity
 *
 * @property int $id
 * @property int $empresa_id
 * @property string $utiliza_agendamentos
 *
 * @property \App\Model\Entity\Empresa $empresa
 */
class EmpresaConfig extends Entity
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
        'empresa_id' => true,
        'utiliza_agendamentos' => true,
        'empresa' => true,
    ];
}
