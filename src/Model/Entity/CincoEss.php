<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CincoEss Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $empresa_id
 * @property int $local_id
 * @property string $oque
 * @property string $como
 * @property string $quando
 * @property int $peso
 * @property string $foto_obrigatoria
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\EmpresaLocai $empresa_locai
 */
class CincoEss extends Entity
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
        'created' => true,
        'empresa_id' => true,
        'local_id' => true,
        'oque' => true,
        'como' => true,
        'quando' => true,
        'peso' => true,
        'foto_obrigatoria' => true,
        'empresa' => true,
        'empresa_locai' => true,
    ];
}
