<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TokensFixture
 */
class TokensFixture extends TestFixture
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
                'usuario_id' => 1,
                'notification_id' => 'Lorem ipsum dolor sit amet',
                'plataforma' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ipsum dolor sit amet',
                'validade' => '2022-06-30',
            ],
        ];
        parent::init();
    }
}
