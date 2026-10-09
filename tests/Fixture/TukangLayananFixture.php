<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TukangLayananFixture
 */
class TukangLayananFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tukang_layanan';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'tukang_tambal_id' => 1,
                'jenis_layanan_id' => 1,
                'tambahan_harga' => 1,
                'created' => '2026-10-09 08:16:35',
                'modified' => '2026-10-09 08:16:35',
            ],
        ];
        parent::init();
    }
}
