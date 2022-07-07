<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;
use Cake\I18n\FrozenTime;

/**
 * Agendamentos Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\ModulosTable&\Cake\ORM\Association\BelongsTo $Modulos
 * @property \App\Model\Table\CincoEssesAuditoriaTable&\Cake\ORM\Association\HasMany $CincoEssesAuditoria
 *
 * @method \App\Model\Entity\Agendamento newEmptyEntity()
 * @method \App\Model\Entity\Agendamento newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Agendamento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Agendamento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Agendamento findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Agendamento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Agendamento[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Agendamento|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agendamento saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Agendamento[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agendamento[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agendamento[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Agendamento[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AgendamentosTable extends Table
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

        $this->setTable('agendamentos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Modulos', [
            'foreignKey' => 'modulo_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('CincoEssesAuditoria', [
            'foreignKey' => 'agendamento_id',
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
            ->integer('modulo_id')
            ->requirePresence('modulo_id', 'create')
            ->notEmptyString('modulo_id');

        $validator
            ->dateTime('inicio')
            ->allowEmptyDateTime('inicio');

        $validator
            ->dateTime('fim')
            ->allowEmptyDateTime('fim');

        $validator
            ->integer('responsavel')
            ->allowEmptyString('responsavel');

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
        $rules->add($rules->existsIn('modulo_id', 'Modulos'), ['errorField' => 'modulo_id']);

        return $rules;
    }
    
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
    {
        
        if (isset($data['data_inicio'])) {
            $date = FrozenTime::createFromFormat('d/m/Y', $data['data_inicio']);
            $data['inicio'] = $date->format('Y-m-d') . ' ' . $data['hora_inicio'];
            unset($data['data_inicio']);
        }
        if (isset($data['hora_inicio'])) {
            unset($data['hora_inicio']);
        }
        if (isset($data['data_fim'])) {
            $date = FrozenTime::createFromFormat('d/m/Y', $data['data_fim']);
            $data['fim'] = $date->format('Y-m-d') . ' ' . $data['hora_fim'];
            unset($data['data_fim']);
        }
        if (isset($data['hora_fim'])) {
            unset($data['hora_fim']);
        }

    }
}
