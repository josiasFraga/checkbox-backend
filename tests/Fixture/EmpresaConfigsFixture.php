<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpresaConfigsFixture
 */
class EmpresaConfigsFixture extends TestFixture
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
                'utiliza_agendamentos' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
