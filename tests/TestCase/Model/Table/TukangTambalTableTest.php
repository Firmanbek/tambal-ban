<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TukangTambalTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TukangTambalTable Test Case
 */
class TukangTambalTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TukangTambalTable
     */
    protected $TukangTambal;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.TukangTambal',
        'app.Users',
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
        $config = $this->getTableLocator()->exists('TukangTambal') ? [] : ['className' => TukangTambalTable::class];
        $this->TukangTambal = $this->getTableLocator()->get('TukangTambal', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TukangTambal);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\TukangTambalTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\TukangTambalTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
