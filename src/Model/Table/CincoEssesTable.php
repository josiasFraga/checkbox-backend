<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CincoEsses Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\EmpresaLocaisTable&\Cake\ORM\Association\BelongsTo $EmpresaLocais
 *
 * @method \App\Model\Entity\CincoEss newEmptyEntity()
 * @method \App\Model\Entity\CincoEss newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEss[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEss get($primaryKey, $options = [])
 * @method \App\Model\Entity\CincoEss findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CincoEss patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEss[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEss|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEss saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEss[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEss[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEss[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEss[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CincoEssesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cinco_esses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('EmpresaLocais', [
            'foreignKey' => 'local_id',
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
            ->integer('empresa_id')
            ->requirePresence('empresa_id', 'create')
            ->notEmptyString('empresa_id');

        $validator
            ->integer('local_id')
            ->requirePresence('local_id', 'create')
            ->notEmptyString('local_id');

        $validator
            ->scalar('oque')
            ->maxLength('oque', 255)
            ->requirePresence('oque', 'create')
            ->notEmptyString('oque');

        $validator
            ->scalar('como')
            ->maxLength('como', 255)
            ->requirePresence('como', 'create')
            ->notEmptyString('como');

        $validator
            ->scalar('quando')
            ->maxLength('quando', 100)
            ->requirePresence('quando', 'create')
            ->notEmptyString('quando');

        $validator
            ->notEmptyString('peso');

        $validator
            ->scalar('foto_obrigatoria')
            ->notEmptyString('foto_obrigatoria');

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
        $rules->add($rules->existsIn('empresa_id', 'Empresas'), ['errorField' => 'empresa_id']);
        $rules->add($rules->existsIn('local_id', 'EmpresaLocais'), ['errorField' => 'local_id']);

        return $rules;
    }
}
