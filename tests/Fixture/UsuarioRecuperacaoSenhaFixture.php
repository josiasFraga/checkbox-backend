<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuarioRecuperacaoSenhaFixture
 */
class UsuarioRecuperacaoSenhaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'usuario_recuperacao_senha';
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
                'created' => 1656625391,
                'usuario_id' => 1,
                'token' => 'Lore',
                'validade' => 1656625391,
            ],
        ];
        parent::init();
    }
}
