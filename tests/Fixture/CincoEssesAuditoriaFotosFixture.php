<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CincoEssesAuditoriaFotosFixture
 */
class CincoEssesAuditoriaFotosFixture extends TestFixture
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
                'auditoria_id' => 1,
                'foto' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
