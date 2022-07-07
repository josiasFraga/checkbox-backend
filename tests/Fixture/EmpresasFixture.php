<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EmpresasFixture
 */
class EmpresasFixture extends TestFixture
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
                'created' => 1656805225,
                'nome' => 1,
                'cnpj' => 'Lorem ipsum dolo',
                'cpf' => 'Lorem ips',
                'telefone' => 'Lorem ipsum d',
                'cidade_id' => 1,
                'estado' => 'Lo',
                'logo' => 'Lorem ipsum dolor sit amet',
                'tipo' => 'Lorem ipsum dolor sit amet',
                'matriz_id' => 1,
            ],
        ];
        parent::init();
    }
}
