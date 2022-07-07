<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmpresaLocais Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 *
 * @method \App\Model\Entity\EmpresaLocai newEmptyEntity()
 * @method \App\Model\Entity\EmpresaLocai newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaLocai[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaLocai get($primaryKey, $options = [])
 * @method \App\Model\Entity\EmpresaLocai findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\EmpresaLocai patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaLocai[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmpresaLocai|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaLocai saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\EmpresaLocai[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaLocai[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaLocai[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\EmpresaLocai[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresaLocaisTable extends Table
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

        $this->setTable('empresa_locais');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

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
