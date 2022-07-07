<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpresaLocaisFixture
 */
class EmpresaLocaisFixture extends TestFixture
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
                'created' => 1656625389,
                'empresa_id' => 1,
                'nome' => 1,
            ],
        ];
        parent::init();
    }
}
