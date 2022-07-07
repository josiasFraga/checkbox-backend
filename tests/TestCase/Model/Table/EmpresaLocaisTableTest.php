<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmpresaLocaisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmpresaLocaisTable Test Case
 */
class EmpresaLocaisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmpresaLocaisTable
     */
    protected $EmpresaLocais;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.EmpresaLocais',
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
        $config = $this->getTableLocator()->exists('EmpresaLocais') ? [] : ['className' => EmpresaLocaisTable::class];
        $this->EmpresaLocais = $this->getTableLocator()->get('EmpresaLocais', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmpresaLocais);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EmpresaLocaisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\EmpresaLocaisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
