<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pesanan Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\TukangTambalTable&\Cake\ORM\Association\BelongsTo $TukangTambals
 * @property \App\Model\Table\JenisLayananTable&\Cake\ORM\Association\BelongsTo $JenisLayanans
 * @property \App\Model\Table\UlasanTable&\Cake\ORM\Association\HasOne $Ulasan
 *
 * @method \App\Model\Entity\Pesanan newEmptyEntity()
 * @method \App\Model\Entity\Pesanan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pesanan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pesanan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pesanan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pesanan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pesanan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pesanan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pesanan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pesanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pesanan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pesanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pesanan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pesanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pesanan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pesanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pesanan> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PesananTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pesanan');
        $this->setDisplayField('nomor_pesanan');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TukangTambals', [
            'foreignKey' => 'tukang_tambal_id',
            'className' => 'TukangTambal',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('JenisLayanans', [
            'foreignKey' => 'jenis_layanan_id',
            'className' => 'JenisLayanan',
            'joinType' => 'INNER',
        ]);
        $this->hasOne('Ulasan', [
            'foreignKey' => 'pesanan_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('nomor_pesanan')
            ->maxLength('nomor_pesanan', 20)
            ->requirePresence('nomor_pesanan', 'create')
            ->notEmptyString('nomor_pesanan')
            ->add('nomor_pesanan', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id');

        $validator
            ->nonNegativeInteger('tukang_tambal_id')
            ->notEmptyString('tukang_tambal_id');

        $validator
            ->nonNegativeInteger('jenis_layanan_id')
            ->notEmptyString('jenis_layanan_id');

        $validator
            ->scalar('jenis_kendaraan')
            ->maxLength('jenis_kendaraan', 10)
            ->notEmptyString('jenis_kendaraan');

        $validator
            ->scalar('catatan')
            ->maxLength('catatan', 140)
            ->allowEmptyString('catatan');

        $validator
            ->decimal('latitude')
            ->requirePresence('latitude', 'create')
            ->notEmptyString('latitude');

        $validator
            ->decimal('longitude')
            ->requirePresence('longitude', 'create')
            ->notEmptyString('longitude');

        $validator
            ->nonNegativeInteger('total_harga')
            ->notEmptyString('total_harga');

        $validator
            ->scalar('status_pesanan')
            ->maxLength('status_pesanan', 20)
            ->notEmptyString('status_pesanan');

        $validator
            ->dateTime('waktu_diterima')
            ->allowEmptyDateTime('waktu_diterima');

        $validator
            ->dateTime('waktu_selesai')
            ->allowEmptyDateTime('waktu_selesai');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['nomor_pesanan']), ['errorField' => 'nomor_pesanan']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['tukang_tambal_id'], 'TukangTambals'), ['errorField' => 'tukang_tambal_id']);
        $rules->add($rules->existsIn(['jenis_layanan_id'], 'JenisLayanans'), ['errorField' => 'jenis_layanan_id']);

        return $rules;
    }
}
