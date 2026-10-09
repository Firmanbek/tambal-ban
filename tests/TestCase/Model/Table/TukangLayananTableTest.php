<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TukangLayananTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TukangLayananTable Test Case
 */
class TukangLayananTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TukangLayananTable
     */
    protected $TukangLayanan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.TukangLayanan',
        'app.TukangTambals',
        'app.JenisLayanans',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TukangLayanan') ? [] : ['className' => TukangLayananTable::class];
        $this->TukangLayanan = $this->getTableLocator()->get('TukangLayanan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TukangLayanan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\TukangLayananTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\TukangLayananTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
