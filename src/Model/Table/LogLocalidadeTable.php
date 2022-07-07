<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LogLocalidade Model
 *
 * @method \App\Model\Entity\LogLocalidade newEmptyEntity()
 * @method \App\Model\Entity\LogLocalidade newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\LogLocalidade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LogLocalidade get($primaryKey, $options = [])
 * @method \App\Model\Entity\LogLocalidade findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\LogLocalidade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LogLocalidade[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\LogLocalidade|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogLocalidade saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LogLocalidade[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogLocalidade[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogLocalidade[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\LogLocalidade[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LogLocalidadeTable extends Table
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

        $this->setTable('log_localidade');
        $this->setDisplayField('loc_nu_sequencial');
        $this->setPrimaryKey('loc_nu_sequencial');
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
            ->scalar('loc_nosub')
            ->maxLength('loc_nosub', 50)
            ->allowEmptyString('loc_nosub');

        $validator
            ->scalar('loc_no')
            ->maxLength('loc_no', 60)
            ->allowEmptyString('loc_no');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 16)
            ->allowEmptyString('cep');

        $validator
            ->scalar('ufe_sg')
            ->maxLength('ufe_sg', 2)
            ->allowEmptyString('ufe_sg');

        $validator
            ->integer('loc_in_situacao')
            ->allowEmptyString('loc_in_situacao');

        $validator
            ->scalar('loc_in_tipo_localidade')
            ->maxLength('loc_in_tipo_localidade', 1)
            ->requirePresence('loc_in_tipo_localidade', 'create')
            ->notEmptyString('loc_in_tipo_localidade');

        $validator
            ->integer('loc_nu_sequencial_sub')
            ->allowEmptyString('loc_nu_sequencial_sub');

        $validator
            ->scalar('loc_key_dne')
            ->maxLength('loc_key_dne', 16)
            ->allowEmptyString('loc_key_dne');

        $validator
            ->scalar('temp')
            ->maxLength('temp', 8)
            ->allowEmptyString('temp');

        return $validator;
    }
}
