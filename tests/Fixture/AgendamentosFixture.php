<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AgendamentosFixture
 */
class AgendamentosFixture extends TestFixture
{
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
                'modulo_id' => 1,
                'inicio' => 1656625387,
                'fim' => 1656625387,
                'responsavel' => 1,
            ],
        ];
        parent::init();
    }
}
