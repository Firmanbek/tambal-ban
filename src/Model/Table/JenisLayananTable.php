<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * JenisLayanan Model
 *
 * @property \App\Model\Table\PesananTable&\Cake\ORM\Association\HasMany $Pesanan
 * @property \App\Model\Table\TukangLayananTable&\Cake\ORM\Association\HasMany $TukangLayanan
 *
 * @method \App\Model\Entity\JenisLayanan newEmptyEntity()
 * @method \App\Model\Entity\JenisLayanan newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\JenisLayanan> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\JenisLayanan get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\JenisLayanan findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\JenisLayanan patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\JenisLayanan> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\JenisLayanan|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\JenisLayanan saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\JenisLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JenisLayanan>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JenisLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JenisLayanan> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JenisLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JenisLayanan>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\JenisLayanan>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\JenisLayanan> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class JenisLayananTable extends Table
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

        $this->setTable('jenis_layanan');
        $this->setDisplayField('kode');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Pesanan', [
            'foreignKey' => 'jenis_layanan_id',
        ]);
        $this->hasMany('TukangLayanan', [
            'foreignKey' => 'jenis_layanan_id',
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
            ->scalar('kode')
            ->maxLength('kode', 20)
            ->requirePresence('kode', 'create')
            ->notEmptyString('kode')
            ->add('kode', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('nama')
            ->maxLength('nama', 100)
            ->requirePresence('nama', 'create')
            ->notEmptyString('nama');

        $validator
            ->scalar('keterangan')
            ->maxLength('keterangan', 120)
            ->allowEmptyString('keterangan');

        $validator
            ->scalar('ikon')
            ->maxLength('ikon', 30)
            ->allowEmptyString('ikon');

        $validator
            ->nonNegativeInteger('harga_motor')
            ->notEmptyString('harga_motor');

        $validator
            ->nonNegativeInteger('harga_mobil')
            ->notEmptyString('harga_mobil');

        $validator
            ->boolean('aktif')
            ->notEmptyString('aktif');

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
        $rules->add($rules->isUnique(['kode']), ['errorField' => 'kode']);

        return $rules;
    }
}
