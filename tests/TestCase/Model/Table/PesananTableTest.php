<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PesananTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PesananTable Test Case
 */
class PesananTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PesananTable
     */
    protected $Pesanan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Pesanan',
        'app.Users',
        'app.TukangTambals',
        'app.JenisLayanans',
        'app.Ulasan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pesanan') ? [] : ['className' => PesananTable::class];
        $this->Pesanan = $this->getTableLocator()->get('Pesanan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pesanan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\PesananTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\PesananTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
