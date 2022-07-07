<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LogFaixaUfFixture
 */
class LogFaixaUfFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'log_faixa_uf';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ufe_sg' => '4c39a205-edec-4d5b-94d7-527515e93356',
                'ufe_no' => 'Lorem ipsum dolor sit amet',
                'ufe_rad1_ini' => 'Lor',
                'ufe_suf1_ini' => 'L',
                'ufe_rad1_fim' => 'Lor',
                'ufe_suf1_fim' => 'L',
                'ufe_rad2_ini' => 'Lor',
                'ufe_suf2_ini' => 'L',
                'ufe_rad2_fim' => 'Lor',
                'ufe_suf2_fim' => 'L',
            ],
        ];
        parent::init();
    }
}
