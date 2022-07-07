<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LogLocalidadeFixture
 */
class LogLocalidadeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'log_localidade';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'loc_nu_sequencial' => 1,
                'loc_nosub' => 'Lorem ipsum dolor sit amet',
                'loc_no' => 'Lorem ipsum dolor sit amet',
                'cep' => 'Lorem ipsum do',
                'ufe_sg' => 'Lo',
                'loc_in_situacao' => 1,
                'loc_in_tipo_localidade' => 'L',
                'loc_nu_sequencial_sub' => 1,
                'loc_key_dne' => 'Lorem ipsum do',
                'temp' => '',
            ],
        ];
        parent::init();
    }
}
