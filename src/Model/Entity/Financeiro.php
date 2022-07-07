<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Financeiro Entity
 *
 * @property int $id
 * @property int $empresa_id
 * @property int $status_id
 * @property int|null $cc_id
 * @property string|null $payment_api_id
 * @property string $tipo
 * @property float $valor
 * @property \Cake\I18n\FrozenTime $data_criacao
 * @property \Cake\I18n\FrozenDate $data_vencimento
 * @property string|null $descricao
 * @property string|null $forma_pagamento
 * @property string|null $boleto_link
 * @property \Cake\I18n\FrozenDate|null $boleto_vencimento
 * @property \Cake\I18n\FrozenDate|null $data_confirmacao
 * @property \Cake\I18n\FrozenDate|null $data_pagamento_cliente
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\FinanceiroStatus $financeiro_status
 * @property \App\Model\Entity\UsuarioCc $usuario_cc
 * @property \App\Model\Entity\PaymentApi $payment_api
 */
class Financeiro extends Entity
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
        'status_id' => true,
        'cc_id' => true,
        'payment_api_id' => true,
        'tipo' => true,
        'valor' => true,
        'data_criacao' => true,
        'data_vencimento' => true,
        'descricao' => true,
        'forma_pagamento' => true,
        'boleto_link' => true,
        'boleto_vencimento' => true,
        'data_confirmacao' => true,
        'data_pagamento_cliente' => true,
        'empresa' => true,
        'financeiro_status' => true,
        'usuario_cc' => true,
        'payment_api' => true,
    ];
}
