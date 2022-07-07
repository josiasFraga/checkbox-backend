<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FinanceiroStatus Model
 *
 * @method \App\Model\Entity\FinanceiroStatus newEmptyEntity()
 * @method \App\Model\Entity\FinanceiroStatus newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FinanceiroStatus get($primaryKey, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FinanceiroStatus|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\FinanceiroStatus[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class FinanceiroStatusTable extends Table
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

        $this->setTable('financeiro_status');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('descricao')
            ->maxLength('descricao', 150)
            ->requirePresence('descricao', 'create')
            ->notEmptyString('descricao');

        $validator
            ->scalar('descricao_pro_cliente')
            ->maxLength('descricao_pro_cliente', 150)
            ->requirePresence('descricao_pro_cliente', 'create')
            ->notEmptyString('descricao_pro_cliente');

        $validator
            ->scalar('asaas')
            ->maxLength('asaas', 150)
            ->requirePresence('asaas', 'create')
            ->notEmptyString('asaas');

        return $validator;
    }
}
