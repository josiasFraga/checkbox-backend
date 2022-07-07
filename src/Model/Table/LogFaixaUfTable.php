<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogFaixaUf Model
 *
 * @method \App\Model\Entity\LogFaixaUf newEmptyEntity()
 * @method \App\Model\Entity\LogFaixaUf newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LogFaixaUf[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LogFaixaUf get($primaryKey, $options = [])
 * @method \App\Model\Entity\LogFaixaUf findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LogFaixaUf patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LogFaixaUf[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LogFaixaUf|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogFaixaUf saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogFaixaUf[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogFaixaUf[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogFaixaUf[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogFaixaUf[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LogFaixaUfTable extends Table
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

        $this->setTable('log_faixa_uf');
        $this->setDisplayField('ufe_sg');
        $this->setPrimaryKey('ufe_sg');
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
            ->scalar('ufe_no')
            ->maxLength('ufe_no', 72)
            ->requirePresence('ufe_no', 'create')
            ->notEmptyString('ufe_no');

        $validator
            ->scalar('ufe_rad1_ini')
            ->maxLength('ufe_rad1_ini', 5)
            ->requirePresence('ufe_rad1_ini', 'create')
            ->notEmptyString('ufe_rad1_ini');

        $validator
            ->scalar('ufe_suf1_ini')
            ->maxLength('ufe_suf1_ini', 3)
            ->requirePresence('ufe_suf1_ini', 'create')
            ->notEmptyString('ufe_suf1_ini');

        $validator
            ->scalar('ufe_rad1_fim')
            ->maxLength('ufe_rad1_fim', 5)
            ->requirePresence('ufe_rad1_fim', 'create')
            ->notEmptyString('ufe_rad1_fim');

        $validator
            ->scalar('ufe_suf1_fim')
            ->maxLength('ufe_suf1_fim', 3)
            ->requirePresence('ufe_suf1_fim', 'create')
            ->notEmptyString('ufe_suf1_fim');

        $validator
            ->scalar('ufe_rad2_ini')
            ->maxLength('ufe_rad2_ini', 5)
            ->allowEmptyString('ufe_rad2_ini');

        $validator
            ->scalar('ufe_suf2_ini')
            ->maxLength('ufe_suf2_ini', 3)
            ->allowEmptyString('ufe_suf2_ini');

        $validator
            ->scalar('ufe_rad2_fim')
            ->maxLength('ufe_rad2_fim', 5)
            ->allowEmptyString('ufe_rad2_fim');

        $validator
            ->scalar('ufe_suf2_fim')
            ->maxLength('ufe_suf2_fim', 3)
            ->allowEmptyString('ufe_suf2_fim');

        return $validator;
    }
}
