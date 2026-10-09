<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * JenisLayananFixture
 */
class JenisLayananFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'jenis_layanan';
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
                'kode' => 'Lorem ipsum dolor ',
                'nama' => 'Lorem ipsum dolor sit amet',
                'keterangan' => 'Lorem ipsum dolor sit amet',
                'ikon' => 'Lorem ipsum dolor sit amet',
                'harga_motor' => 1,
                'harga_mobil' => 1,
                'aktif' => 1,
                'created' => '2026-10-09 08:16:35',
                'modified' => '2026-10-09 08:16:35',
            ],
        ];
        parent::init();
    }
}
