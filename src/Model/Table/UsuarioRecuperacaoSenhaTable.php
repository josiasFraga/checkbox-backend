<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsuarioRecuperacaoSenha Model
 *
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha newEmptyEntity()
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\UsuarioRecuperacaoSenha[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuarioRecuperacaoSenhaTable extends Table
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

        $this->setTable('usuario_recuperacao_senha');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

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
            ->scalar('token')
            ->maxLength('token', 6)
            ->requirePresence('token', 'create')
            ->notEmptyString('token');

        $validator
            ->dateTime('validade')
            ->allowEmptyDateTime('validade');

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
