<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UlasanTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UlasanTable Test Case
 */
class UlasanTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UlasanTable
     */
    protected $Ulasan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Ulasan',
        'app.Pesanans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Ulasan') ? [] : ['className' => UlasanTable::class];
        $this->Ulasan = $this->getTableLocator()->get('Ulasan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ulasan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\UlasanTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\UlasanTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
