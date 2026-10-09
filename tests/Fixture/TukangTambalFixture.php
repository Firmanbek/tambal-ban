<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TukangTambalFixture
 */
class TukangTambalFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'tukang_tambal';
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
                'user_id' => 1,
                'nama_bengkel' => 'Lorem ipsum dolor sit amet',
                'plat_nomor' => 'Lorem ipsum d',
                'keterangan' => 'Lorem ipsum dolor sit amet',
                'alamat' => 'Lorem ipsum dolor sit amet',
                'latitude' => 1.5,
                'longitude' => 1.5,
                'sedang_buka' => 1,
                'status_verifikasi' => 'Lorem ipsum dolor ',
                'created' => '2026-10-09 08:16:35',
                'modified' => '2026-10-09 08:16:35',
            ],
        ];
        parent::init();
    }
}
