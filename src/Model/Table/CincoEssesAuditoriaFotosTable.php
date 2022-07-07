<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CincoEssesAuditoriaFotos Model
 *
 * @property \App\Model\Table\CincoEssesAuditoriaTable&\Cake\ORM\Association\BelongsTo $CincoEssesAuditoria
 *
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto newEmptyEntity()
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto get($primaryKey, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\CincoEssesAuditoriaFoto[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class CincoEssesAuditoriaFotosTable extends Table
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

        $this->setTable('cinco_esses_auditoria_fotos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('CincoEssesAuditoria', [
            'foreignKey' => 'auditoria_id',
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
            ->integer('auditoria_id')
            ->requirePresence('auditoria_id', 'create')
            ->notEmptyString('auditoria_id');

        $validator
            ->scalar('foto')
            ->maxLength('foto', 100)
            ->requirePresence('foto', 'create')
            ->notEmptyString('foto');

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
        $rules->add($rules->existsIn('auditoria_id', 'CincoEssesAuditoria'), ['errorField' => 'auditoria_id']);

        return $rules;
    }
}
