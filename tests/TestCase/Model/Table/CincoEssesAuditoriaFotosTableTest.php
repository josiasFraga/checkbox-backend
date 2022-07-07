<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CincoEssesAuditoriaFotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CincoEssesAuditoriaFotosTable Test Case
 */
class CincoEssesAuditoriaFotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CincoEssesAuditoriaFotosTable
     */
    protected $CincoEssesAuditoriaFotos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CincoEssesAuditoriaFotos',
        'app.CincoEssesAuditoria',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CincoEssesAuditoriaFotos') ? [] : ['className' => CincoEssesAuditoriaFotosTable::class];
        $this->CincoEssesAuditoriaFotos = $this->getTableLocator()->get('CincoEssesAuditoriaFotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CincoEssesAuditoriaFotos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesAuditoriaFotosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesAuditoriaFotosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
