<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * JenisLayanan Entity
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string|null $keterangan
 * @property string|null $ikon
 * @property int $harga_motor
 * @property int $harga_mobil
 * @property bool $aktif
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Pesanan[] $pesanan
 * @property \App\Model\Entity\TukangLayanan[] $tukang_layanan
 */
class JenisLayanan extends Entity
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
        'kode' => true,
        'nama' => true,
        'keterangan' => true,
        'ikon' => true,
        'harga_motor' => true,
        'harga_mobil' => true,
        'aktif' => true,
        'created' => true,
        'modified' => true,
        'pesanan' => true,
        'tukang_layanan' => true,
    ];
}
