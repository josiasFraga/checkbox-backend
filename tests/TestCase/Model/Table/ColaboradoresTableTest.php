<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ColaboradoresTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ColaboradoresTable Test Case
 */
class ColaboradoresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ColaboradoresTable
     */
    protected $Colaboradores;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Colaboradores',
        'app.Empresas',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Colaboradores') ? [] : ['className' => ColaboradoresTable::class];
        $this->Colaboradores = $this->getTableLocator()->get('Colaboradores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Colaboradores);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ColaboradoresTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ColaboradoresTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
