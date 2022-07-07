<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CincoEssesAuditoriaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CincoEssesAuditoriaTable Test Case
 */
class CincoEssesAuditoriaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CincoEssesAuditoriaTable
     */
    protected $CincoEssesAuditoria;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CincoEssesAuditoria',
        'app.Agendamentos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CincoEssesAuditoria') ? [] : ['className' => CincoEssesAuditoriaTable::class];
        $this->CincoEssesAuditoria = $this->getTableLocator()->get('CincoEssesAuditoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CincoEssesAuditoria);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesAuditoriaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesAuditoriaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
