<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsuarioRecuperacaoSenha Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property int $usuario_id
 * @property string $token
 * @property \Cake\I18n\FrozenTime|null $validade
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class UsuarioRecuperacaoSenha extends Entity
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
        'usuario_id' => true,
        'token' => true,
        'validade' => true,
        'usuario' => true,
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
