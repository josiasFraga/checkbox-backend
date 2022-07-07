<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CincoEssesAuditoriaFixture
 */
class CincoEssesAuditoriaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cinco_esses_auditoria';
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
                'agendamento_id' => 1,
            ],
        ];
        parent::init();
    }
}
