<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogLocalidadeTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogLocalidadeTable Test Case
 */
class LogLocalidadeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\LogLocalidadeTable
     */
    protected $LogLocalidade;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.LogLocalidade',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('LogLocalidade') ? [] : ['className' => LogLocalidadeTable::class];
        $this->LogLocalidade = $this->getTableLocator()->get('LogLocalidade', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->LogLocalidade);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\LogLocalidadeTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
