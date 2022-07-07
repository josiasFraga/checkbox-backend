<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Colaboradore Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string $nome
 * @property int $empresa_id
 * @property int|null $usuario_id
 * @property string|null $cpf
 * @property string|null $email
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Usuario $usuario
 */
class Colaboradore extends Entity
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
        'nome' => true,
        'empresa_id' => true,
        'usuario_id' => true,
        'cpf' => true,
        'email' => true,
        'empresa' => true,
        'usuario' => true,
    ];
}
