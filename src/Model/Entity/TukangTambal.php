<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TukangTambal Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama_bengkel
 * @property string|null $plat_nomor
 * @property string|null $keterangan
 * @property string|null $alamat
 * @property string|null $latitude
 * @property string|null $longitude
 * @property bool $sedang_buka
 * @property string $status_verifikasi
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Pesanan[] $pesanan
 * @property \App\Model\Entity\TukangLayanan[] $tukang_layanan
 */
class TukangTambal extends Entity
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
        'user_id' => true,
        'nama_bengkel' => true,
        'plat_nomor' => true,
        'keterangan' => true,
        'alamat' => true,
        'latitude' => true,
        'longitude' => true,
        'sedang_buka' => true,
        'status_verifikasi' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'pesanan' => true,
        'tukang_layanan' => true,
    ];
}
