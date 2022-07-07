<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Empresa Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property string $nome
 * @property string|null $cnpj
 * @property string|null $cpf
 * @property string $telefone
 * @property int $cidade_id
 * @property string $estado
 * @property string $logo
 * @property string $tipo
 * @property int|null $matriz_id
 * @property int|null $admin_id
 * @property string|null $logo_dir
 *
 * @property \App\Model\Entity\LogLocalidade $log_localidade
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Agendamento[] $agendamentos
 * @property \App\Model\Entity\CincoEss[] $cinco_esses
 * @property \App\Model\Entity\Colaborador[] $colaboradores
 * @property \App\Model\Entity\EmpresaConfig[] $empresa_configs
 * @property \App\Model\Entity\EmpresaLocai[] $empresa_locais
 * @property \App\Model\Entity\Financeiro[] $financeiro
 * @property \App\Model\Entity\Usuario[] $usuarios
 */
class Empresa extends Entity
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
        'cnpj' => true,
        'cpf' => true,
        'telefone' => true,
        'cidade_id' => true,
        'estado' => true,
        'logo' => true,
        'logo_dir' => true,
        'tipo' => true,
        'matriz_id' => true,
        'admin_id' => true,
        'log_localidade' => true,
        'empresa' => true,
        'agendamentos' => true,
        'cinco_esses' => true,
        'colaboradores' => true,
        'empresa_configs' => true,
        'empresa_locais' => true,
        'financeiro' => true,
        'usuarios' => true,
    ];
}
