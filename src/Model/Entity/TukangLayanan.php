<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TukangLayanan Entity
 *
 * @property int $id
 * @property int $tukang_tambal_id
 * @property int $jenis_layanan_id
 * @property int $tambahan_harga
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\TukangTambal $tukang_tambal
 * @property \App\Model\Entity\JenisLayanan $jenis_layanan
 */
class TukangLayanan extends Entity
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
        'tukang_tambal_id' => true,
        'jenis_layanan_id' => true,
        'tambahan_harga' => true,
        'created' => true,
        'modified' => true,
        'tukang_tambal' => true,
        'jenis_layanan' => true,
    ];
}
