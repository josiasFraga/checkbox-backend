<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ColaboradoresFixture
 */
class ColaboradoresFixture extends TestFixture
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
                'created' => 1656824804,
                'nome' => 'Lorem ipsum dolor sit amet',
                'empresa_id' => 1,
                'usuario_id' => 1,
                'cpf' => 'Lorem ipsum ',
                'email' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
