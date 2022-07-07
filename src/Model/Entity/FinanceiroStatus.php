<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * FinanceiroStatus Entity
 *
 * @property int $id
 * @property string $descricao
 * @property string $descricao_pro_cliente
 * @property string $asaas
 */
class FinanceiroStatus extends Entity
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
        'descricao' => true,
        'descricao_pro_cliente' => true,
        'asaas' => true,
    ];
}
