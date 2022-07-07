<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpresaConfigs Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\EmpresaConfig newEmptyEntity()
 * @method \App\Model\Entity\EmpresaConfig newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaConfig[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaConfig get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpresaConfig findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EmpresaConfig patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaConfig[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaConfig|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaConfig saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaConfig[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaConfig[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaConfig[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaConfig[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class EmpresaConfigsTable extends Table
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

        $this->setTable('empresa_configs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
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
            ->scalar('utiliza_agendamentos')
            ->notEmptyString('utiliza_agendamentos');

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

        return $rules;
    }
}
