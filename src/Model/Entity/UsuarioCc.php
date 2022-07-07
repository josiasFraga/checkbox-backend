<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsuarioCc Entity
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $name
 * @property string $email
 * @property string|null $cpf
 * @property string|null $cnpj
 * @property string $cep
 * @property string $endereco
 * @property int $endereco_n
 * @property string|null $endereco_complemento
 * @property string $telefone
 * @property string $nome_impresso
 * @property string $numero
 * @property string $expiracao_mes
 * @property string $expiracao_ano
 * @property int $ccv
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class UsuarioCc extends Entity
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
        'name' => true,
        'email' => true,
        'cpf' => true,
        'cnpj' => true,
        'cep' => true,
        'endereco' => true,
        'endereco_n' => true,
        'endereco_complemento' => true,
        'telefone' => true,
        'nome_impresso' => true,
        'numero' => true,
        'expiracao_mes' => true,
        'expiracao_ano' => true,
        'ccv' => true,
        'usuario' => true,
    ];
}
