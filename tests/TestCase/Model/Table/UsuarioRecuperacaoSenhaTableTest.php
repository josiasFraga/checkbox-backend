<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuarioRecuperacaoSenhaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuarioRecuperacaoSenhaTable Test Case
 */
class UsuarioRecuperacaoSenhaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuarioRecuperacaoSenhaTable
     */
    protected $UsuarioRecuperacaoSenha;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.UsuarioRecuperacaoSenha',
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
        $config = $this->getTableLocator()->exists('UsuarioRecuperacaoSenha') ? [] : ['className' => UsuarioRecuperacaoSenhaTable::class];
        $this->UsuarioRecuperacaoSenha = $this->getTableLocator()->get('UsuarioRecuperacaoSenha', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->UsuarioRecuperacaoSenha);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UsuarioRecuperacaoSenhaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UsuarioRecuperacaoSenhaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
