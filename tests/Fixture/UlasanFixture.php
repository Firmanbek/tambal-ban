<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UlasanFixture
 */
class UlasanFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'ulasan';
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
                'pesanan_id' => 1,
                'bintang' => 1,
                'komentar' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-10-09 08:16:35',
                'modified' => '2026-10-09 08:16:35',
            ],
        ];
        parent::init();
    }
}
