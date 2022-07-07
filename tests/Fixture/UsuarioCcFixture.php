<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuarioCcFixture
 */
class UsuarioCcFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'usuario_cc';
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
                'usuario_id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'cpf' => 'Lorem ipsum ',
                'cnpj' => 'Lorem ipsum dolor',
                'cep' => 'Lorem i',
                'endereco' => 'Lorem ipsum dolor sit amet',
                'endereco_n' => 1,
                'endereco_complemento' => 'Lorem ipsum dolor sit amet',
                'telefone' => 'Lorem ipsum dolor sit amet',
                'nome_impresso' => 'Lorem ipsum dolor sit amet',
                'numero' => 'Lorem ipsum dolor sit amet',
                'expiracao_mes' => '',
                'expiracao_ano' => 'Lorem ipsum dolor sit amet',
                'ccv' => 1,
            ],
        ];
        parent::init();
    }
}
