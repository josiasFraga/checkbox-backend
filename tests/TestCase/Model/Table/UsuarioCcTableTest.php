<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuarioCcTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuarioCcTable Test Case
 */
class UsuarioCcTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuarioCcTable
     */
    protected $UsuarioCc;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsuarioCc',
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
        $config = $this->getTableLocator()->exists('UsuarioCc') ? [] : ['className' => UsuarioCcTable::class];
        $this->UsuarioCc = $this->getTableLocator()->get('UsuarioCc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsuarioCc);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsuarioCcTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsuarioCcTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
