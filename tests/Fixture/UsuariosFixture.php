<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsuariosFixture
 */
class UsuariosFixture extends TestFixture
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
                'created' => 1656803000,
                'role' => 'Lorem ipsum dolor sit amet',
                'nome' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'ativo' => 'Lorem ipsum dolor sit amet',
                'img' => '',
                'img_dir' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
