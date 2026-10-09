<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PesananFixture
 */
class PesananFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'pesanan';
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
                'nomor_pesanan' => 'Lorem ipsum dolor ',
                'user_id' => 1,
                'tukang_tambal_id' => 1,
                'jenis_layanan_id' => 1,
                'jenis_kendaraan' => 'Lorem ip',
                'catatan' => 'Lorem ipsum dolor sit amet',
                'latitude' => 1.5,
                'longitude' => 1.5,
                'total_harga' => 1,
                'status_pesanan' => 'Lorem ipsum dolor ',
                'waktu_diterima' => '2026-10-09 08:16:35',
                'waktu_selesai' => '2026-10-09 08:16:35',
                'created' => '2026-10-09 08:16:35',
                'modified' => '2026-10-09 08:16:35',
            ],
        ];
        parent::init();
    }
}
