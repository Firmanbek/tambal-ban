<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JenisLayananTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JenisLayananTable Test Case
 */
class JenisLayananTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\JenisLayananTable
     */
    protected $JenisLayanan;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.JenisLayanan',
        'app.Pesanan',
        'app.TukangLayanan',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('JenisLayanan') ? [] : ['className' => JenisLayananTable::class];
        $this->JenisLayanan = $this->getTableLocator()->get('JenisLayanan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->JenisLayanan);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\JenisLayananTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\JenisLayananTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
