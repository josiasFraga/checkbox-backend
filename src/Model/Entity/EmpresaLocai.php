<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EmpresaLocai Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $empresa_id
 * @property string $nome
 *
 * @property \App\Model\Entity\Empresa $empresa
 */
class EmpresaLocai extends Entity
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
        'nome' => true,
        'empresa' => true,
    ];
}
