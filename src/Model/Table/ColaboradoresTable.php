<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Colaboradores Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\Colaboradore newEmptyEntity()
 * @method \App\Model\Entity\Colaboradore newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Colaboradore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Colaboradore get($primaryKey, $options = [])
 * @method \App\Model\Entity\Colaboradore findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Colaboradore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Colaboradore[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Colaboradore|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Colaboradore saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Colaboradore[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Colaboradore[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Colaboradore[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Colaboradore[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ColaboradoresTable extends Table
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

        $this->setTable('colaboradores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
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
            ->scalar('nome')
            ->maxLength('nome', 80)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->integer('empresa_id')
            ->requirePresence('empresa_id', 'create')
            ->notEmptyString('empresa_id');

        $validator
            ->integer('usuario_id')
            ->allowEmptyString('usuario_id');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 14)
            ->allowEmptyString('cpf');

        $validator
            ->email('email')
            ->allowEmptyString('email');

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
        $rules->add($rules->existsIn('usuario_id', 'Usuarios'), ['errorField' => 'usuario_id']);

        return $rules;
    }
}
