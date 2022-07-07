<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FinanceiroStatusTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FinanceiroStatusTable Test Case
 */
class FinanceiroStatusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FinanceiroStatusTable
     */
    protected $FinanceiroStatus;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.FinanceiroStatus',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('FinanceiroStatus') ? [] : ['className' => FinanceiroStatusTable::class];
        $this->FinanceiroStatus = $this->getTableLocator()->get('FinanceiroStatus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->FinanceiroStatus);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FinanceiroStatusTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
