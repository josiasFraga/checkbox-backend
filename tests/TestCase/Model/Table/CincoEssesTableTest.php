<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CincoEssesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CincoEssesTable Test Case
 */
class CincoEssesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CincoEssesTable
     */
    protected $CincoEsses;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.CincoEsses',
        'app.Empresas',
        'app.EmpresaLocais',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CincoEsses') ? [] : ['className' => CincoEssesTable::class];
        $this->CincoEsses = $this->getTableLocator()->get('CincoEsses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->CincoEsses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\CincoEssesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
