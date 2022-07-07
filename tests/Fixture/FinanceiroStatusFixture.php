<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FinanceiroStatusFixture
 */
class FinanceiroStatusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'financeiro_status';
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
                'descricao' => 'Lorem ipsum dolor sit amet',
                'descricao_pro_cliente' => 'Lorem ipsum dolor sit amet',
                'asaas' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
