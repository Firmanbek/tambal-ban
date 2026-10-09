<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pesanan Entity
 *
 * @property int $id
 * @property string $nomor_pesanan
 * @property int $user_id
 * @property int $tukang_tambal_id
 * @property int $jenis_layanan_id
 * @property string $jenis_kendaraan
 * @property string|null $catatan
 * @property string $latitude
 * @property string $longitude
 * @property int $total_harga
 * @property string $status_pesanan
 * @property \Cake\I18n\DateTime|null $waktu_diterima
 * @property \Cake\I18n\DateTime|null $waktu_selesai
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\TukangTambal $tukang_tambal
 * @property \App\Model\Entity\JenisLayanan $jenis_layanan
 * @property \App\Model\Entity\Ulasan $ulasan
 */
class Pesanan extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'nomor_pesanan' => true,
        'user_id' => true,
        'tukang_tambal_id' => true,
        'jenis_layanan_id' => true,
        'jenis_kendaraan' => true,
        'catatan' => true,
        'latitude' => true,
        'longitude' => true,
        'total_harga' => true,
        'status_pesanan' => true,
        'waktu_diterima' => true,
        'waktu_selesai' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'tukang_tambal' => true,
        'jenis_layanan' => true,
        'ulasan' => true,
    ];
}
