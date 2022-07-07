<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property int|null $empresa_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string $role
 * @property string $nome
 * @property string $email
 * @property string $password
 * @property string $ativo
 * @property string $img
 * @property string|null $img_dir
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Colaboradore[] $colaboradores
 * @property \App\Model\Entity\Token[] $tokens
 * @property \App\Model\Entity\UsuarioCc[] $usuario_cc
 * @property \App\Model\Entity\UsuarioRecuperacaoSenha[] $usuario_recuperacao_senha
 */
class Usuario extends Entity
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
        'created' => true,
        'role' => true,
        'nome' => true,
        'email' => true,
        'password' => true,
        'ativo' => true,
        'img' => true,
        'img_dir' => true,
        'empresa' => true,
        'colaboradores' => true,
        'tokens' => true,
        'usuario_cc' => true,
        'usuario_recuperacao_senha' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
