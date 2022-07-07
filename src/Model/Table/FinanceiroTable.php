<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Financeiro Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\FinanceiroStatusTable&\Cake\ORM\Association\BelongsTo $FinanceiroStatus
 * @property \App\Model\Table\UsuarioCcTable&\Cake\ORM\Association\BelongsTo $UsuarioCc
 * @property \App\Model\Table\PaymentApisTable&\Cake\ORM\Association\BelongsTo $PaymentApis
 *
 * @method \App\Model\Entity\Financeiro newEmptyEntity()
 * @method \App\Model\Entity\Financeiro newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Financeiro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Financeiro get($primaryKey, $options = [])
 * @method \App\Model\Entity\Financeiro findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Financeiro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Financeiro[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Financeiro|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Financeiro saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Financeiro[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Financeiro[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Financeiro[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Financeiro[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FinanceiroTable extends Table
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

        $this->setTable('financeiro');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('FinanceiroStatus', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('UsuarioCc', [
            'foreignKey' => 'cc_id',
        ]);
        $this->belongsTo('PaymentApis', [
            'foreignKey' => 'payment_api_id',
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
            ->integer('status_id')
            ->requirePresence('status_id', 'create')
            ->notEmptyString('status_id');

        $validator
            ->integer('cc_id')
            ->allowEmptyString('cc_id');

        $validator
            ->scalar('payment_api_id')
            ->maxLength('payment_api_id', 50)
            ->allowEmptyString('payment_api_id')
            ->add('payment_api_id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmptyString('valor');

        $validator
            ->dateTime('data_criacao')
            ->notEmptyDateTime('data_criacao');

        $validator
            ->date('data_vencimento')
            ->requirePresence('data_vencimento', 'create')
            ->notEmptyDate('data_vencimento');

        $validator
            ->scalar('descricao')
            ->allowEmptyString('descricao');

        $validator
            ->scalar('forma_pagamento')
            ->allowEmptyString('forma_pagamento');

        $validator
            ->scalar('boleto_link')
            ->maxLength('boleto_link', 100)
            ->allowEmptyString('boleto_link');

        $validator
            ->date('boleto_vencimento')
            ->allowEmptyDate('boleto_vencimento');

        $validator
            ->date('data_confirmacao')
            ->allowEmptyDate('data_confirmacao');

        $validator
            ->date('data_pagamento_cliente')
            ->allowEmptyDate('data_pagamento_cliente');

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
        $rules->add($rules->existsIn('payment_api_id', 'PaymentApis'), ['errorField' => 'payment_api_id']);
        $rules->add($rules->existsIn('empresa_id', 'Empresas'), ['errorField' => 'empresa_id']);
        $rules->add($rules->existsIn('status_id', 'FinanceiroStatus'), ['errorField' => 'status_id']);
        $rules->add($rules->existsIn('cc_id', 'UsuarioCc'), ['errorField' => 'cc_id']);

        return $rules;
    }
}
