<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TukangLayanan Model
 *
 * @property \App\Model\Table\TukangTambalTable&\Cake\ORM\Association\BelongsTo $TukangTambals
 * @property \App\Model\Table\JenisLayananTable&\Cake\ORM\Association\BelongsTo $JenisLayanans
 *
 * @method \App\Model\Entity\TukangLayanan newEmptyEntity()
 * @method \App\Model\Entity\TukangLayanan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TukangLayanan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TukangLayanan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TukangLayanan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TukangLayanan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TukangLayanan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TukangLayanan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TukangLayanan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TukangLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangLayanan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangLayanan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangLayanan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TukangLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TukangLayanan> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TukangLayananTable extends Table
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

        $this->setTable('tukang_layanan');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->nonNegativeInteger('tukang_tambal_id')
            ->notEmptyString('tukang_tambal_id');

        $validator
            ->nonNegativeInteger('jenis_layanan_id')
            ->notEmptyString('jenis_layanan_id');

        $validator
            ->nonNegativeInteger('tambahan_harga')
            ->notEmptyString('tambahan_harga');

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
        $rules->add($rules->isUnique(['tukang_tambal_id', 'jenis_layanan_id']), ['errorField' => 'tukang_tambal_id', 'message' => __('This combination of tukang_tambal_id and jenis_layanan_id already exists')]);
        $rules->add($rules->existsIn(['tukang_tambal_id'], 'TukangTambals'), ['errorField' => 'tukang_tambal_id']);
        $rules->add($rules->existsIn(['jenis_layanan_id'], 'JenisLayanans'), ['errorField' => 'jenis_layanan_id']);

        return $rules;
    }
}
