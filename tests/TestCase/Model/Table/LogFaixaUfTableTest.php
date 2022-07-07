<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogFaixaUfTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogFaixaUfTable Test Case
 */
class LogFaixaUfTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogFaixaUfTable
     */
    protected $LogFaixaUf;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LogFaixaUf',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LogFaixaUf') ? [] : ['className' => LogFaixaUfTable::class];
        $this->LogFaixaUf = $this->getTableLocator()->get('LogFaixaUf', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LogFaixaUf);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LogFaixaUfTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
