<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CincoEssesAuditoria Model
 *
 * @property \App\Model\Table\AgendamentosTable&\Cake\ORM\Association\BelongsTo $Agendamentos
 *
 * @method \App\Model\Entity\CincoEssesAuditorium newEmptyEntity()
 * @method \App\Model\Entity\CincoEssesAuditorium newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium get($primaryKey, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditorium[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CincoEssesAuditoriaTable extends Table
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

        $this->setTable('cinco_esses_auditoria');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Agendamentos', [
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
            ->integer('agendamento_id')
            ->allowEmptyString('agendamento_id');

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
        $rules->add($rules->existsIn('agendamento_id', 'Agendamentos'), ['errorField' => 'agendamento_id']);

        return $rules;
    }
}
