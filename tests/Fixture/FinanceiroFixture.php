<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FinanceiroFixture
 */
class FinanceiroFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'financeiro';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'empresa_id' => 1,
                'status_id' => 1,
                'cc_id' => 1,
                'payment_api_id' => 'Lorem ipsum dolor sit amet',
                'tipo' => 'Lorem ipsum dolor sit amet',
                'valor' => 1,
                'data_criacao' => 1656625389,
                'data_vencimento' => '2022-06-30',
                'descricao' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'forma_pagamento' => 'Lorem ipsum dolor sit amet',
                'boleto_link' => 'Lorem ipsum dolor sit amet',
                'boleto_vencimento' => '2022-06-30',
                'data_confirmacao' => '2022-06-30',
                'data_pagamento_cliente' => '2022-06-30',
            ],
        ];
        parent::init();
    }
}
