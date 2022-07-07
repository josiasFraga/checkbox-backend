<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CincoEssesFixture
 */
class CincoEssesFixture extends TestFixture
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
                'created' => 1656978975,
                'empresa_id' => 1,
                'local_id' => 1,
                'oque' => 'Lorem ipsum dolor sit amet',
                'como' => 'Lorem ipsum dolor sit amet',
                'quando' => 'Lorem ipsum dolor sit amet',
                'peso' => 1,
                'foto_obrigatoria' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
