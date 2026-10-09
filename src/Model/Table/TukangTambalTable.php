<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TukangTambal Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PesananTable&\Cake\ORM\Association\HasMany $Pesanan
 * @property \App\Model\Table\TukangLayananTable&\Cake\ORM\Association\HasMany $TukangLayanan
 *
 * @method \App\Model\Entity\TukangTambal newEmptyEntity()
 * @method \App\Model\Entity\TukangTambal newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TukangTambal> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TukangTambal get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TukangTambal findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TukangTambal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TukangTambal> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TukangTambal|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TukangTambal saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TukangTambal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangTambal>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangTambal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangTambal> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangTambal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangTambal>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangTambal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangTambal> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TukangTambalTable extends Table
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

        $this->setTable('tukang_tambal');
        $this->setDisplayField('nama_bengkel');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Pesanan', [
            'foreignKey' => 'tukang_tambal_id',
        ]);
        $this->hasMany('TukangLayanan', [
            'foreignKey' => 'tukang_tambal_id',
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
            ->nonNegativeInteger('user_id')
            ->notEmptyString('user_id')
            ->add('user_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nama_bengkel')
            ->maxLength('nama_bengkel', 120)
            ->requirePresence('nama_bengkel', 'create')
            ->notEmptyString('nama_bengkel');

        $validator
            ->scalar('plat_nomor')
            ->maxLength('plat_nomor', 15)
            ->allowEmptyString('plat_nomor');

        $validator
            ->scalar('keterangan')
            ->maxLength('keterangan', 120)
            ->allowEmptyString('keterangan');

        $validator
            ->scalar('alamat')
            ->maxLength('alamat', 255)
            ->allowEmptyString('alamat');

        $validator
            ->decimal('latitude')
            ->allowEmptyString('latitude');

        $validator
            ->decimal('longitude')
            ->allowEmptyString('longitude');

        $validator
            ->boolean('sedang_buka')
            ->notEmptyString('sedang_buka');

        $validator
            ->scalar('status_verifikasi')
            ->maxLength('status_verifikasi', 20)
            ->notEmptyString('status_verifikasi');

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
        $rules->add($rules->isUnique(['user_id']), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
