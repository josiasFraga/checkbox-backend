<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresaConfigsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresaConfigsTable Test Case
 */
class EmpresaConfigsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresaConfigsTable
     */
    protected $EmpresaConfigs;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EmpresaConfigs',
        'app.Empresas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmpresaConfigs') ? [] : ['className' => EmpresaConfigsTable::class];
        $this->EmpresaConfigs = $this->getTableLocator()->get('EmpresaConfigs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmpresaConfigs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmpresaConfigsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EmpresaConfigsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
