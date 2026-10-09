<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ulasan Entity
 *
 * @property int $id
 * @property int $pesanan_id
 * @property int $bintang
 * @property string|null $komentar
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Pesanan $pesanan
 */
class Ulasan extends Entity
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
        'pesanan_id' => true,
        'bintang' => true,
        'komentar' => true,
        'created' => true,
        'modified' => true,
        'pesanan' => true,
    ];
}
