<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuarioCc Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\UsuarioCc newEmptyEntity()
 * @method \App\Model\Entity\UsuarioCc newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioCc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioCc get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsuarioCc findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsuarioCc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioCc[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioCc|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuarioCc saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuarioCc[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioCc[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioCc[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioCc[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsuarioCcTable extends Table
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

        $this->setTable('usuario_cc');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->integer('usuario_id')
            ->requirePresence('usuario_id', 'create')
            ->notEmptyString('usuario_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 19)
            ->allowEmptyString('cnpj');

        $validator
            ->scalar('cep')
            ->maxLength('cep', 9)
            ->requirePresence('cep', 'create')
            ->notEmptyString('cep');

        $validator
            ->scalar('endereco')
            ->maxLength('endereco', 50)
            ->requirePresence('endereco', 'create')
            ->notEmptyString('endereco');

        $validator
            ->requirePresence('endereco_n', 'create')
            ->notEmptyString('endereco_n');

        $validator
            ->scalar('endereco_complemento')
            ->maxLength('endereco_complemento', 50)
            ->allowEmptyString('endereco_complemento');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 50)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->scalar('nome_impresso')
            ->maxLength('nome_impresso', 100)
            ->requirePresence('nome_impresso', 'create')
            ->notEmptyString('nome_impresso');

        $validator
            ->scalar('numero')
            ->maxLength('numero', 50)
            ->requirePresence('numero', 'create')
            ->notEmptyString('numero');

        $validator
            ->scalar('expiracao_mes')
            ->maxLength('expiracao_mes', 2)
            ->requirePresence('expiracao_mes', 'create')
            ->notEmptyString('expiracao_mes');

        $validator
            ->scalar('expiracao_ano')
            ->requirePresence('expiracao_ano', 'create')
            ->notEmptyString('expiracao_ano');

        $validator
            ->requirePresence('ccv', 'create')
            ->notEmptyString('ccv');

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
        $rules->add($rules->existsIn('usuario_id', 'Usuarios'), ['errorField' => 'usuario_id']);

        return $rules;
    }
}
