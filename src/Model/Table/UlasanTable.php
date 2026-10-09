<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ulasan Model
 *
 * @property \App\Model\Table\PesananTable&\Cake\ORM\Association\BelongsTo $Pesanans
 *
 * @method \App\Model\Entity\Ulasan newEmptyEntity()
 * @method \App\Model\Entity\Ulasan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulasan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ulasan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Ulasan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Ulasan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Ulasan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ulasan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Ulasan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Ulasan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulasan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulasan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulasan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulasan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulasan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Ulasan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Ulasan> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UlasanTable extends Table
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

        $this->setTable('ulasan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pesanans', [
            'foreignKey' => 'pesanan_id',
            'className' => 'Pesanan',
            'joinType' => 'INNER',
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
            ->nonNegativeInteger('pesanan_id')
            ->notEmptyString('pesanan_id')
            ->add('pesanan_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('bintang', 'create')
            ->notEmptyString('bintang');

        $validator
            ->scalar('komentar')
            ->maxLength('komentar', 200)
            ->allowEmptyString('komentar');

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
        $rules->add($rules->isUnique(['pesanan_id']), ['errorField' => 'pesanan_id']);
        $rules->add($rules->existsIn(['pesanan_id'], 'Pesanans'), ['errorField' => 'pesanan_id']);

        return $rules;
    }
}
