<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \App\Model\Table\LogLocalidadeTable&\Cake\ORM\Association\BelongsTo $LogLocalidade
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\AgendamentosTable&\Cake\ORM\Association\HasMany $Agendamentos
 * @property \App\Model\Table\CincoEssesTable&\Cake\ORM\Association\HasMany $CincoEsses
 * @property \App\Model\Table\ColaboradoresTable&\Cake\ORM\Association\HasMany $Colaboradores
 * @property \App\Model\Table\EmpresaConfigsTable&\Cake\ORM\Association\HasMany $EmpresaConfigs
 * @property \App\Model\Table\EmpresaLocaisTable&\Cake\ORM\Association\HasMany $EmpresaLocais
 * @property \App\Model\Table\FinanceiroTable&\Cake\ORM\Association\HasMany $Financeiro
 * @property \App\Model\Table\UsuariosTable&\Cake\ORM\Association\HasMany $Usuarios
 *
 * @method \App\Model\Entity\Empresa newEmptyEntity()
 * @method \App\Model\Entity\Empresa newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Empresa[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasTable extends Table
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

        $this->setTable('empresas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('LogLocalidade', [
            'foreignKey' => 'cidade_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Empresas', [
            'foreignKey' => 'matriz_id',
        ]);
        $this->hasMany('Agendamentos', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('CincoEsses', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('Colaboradores', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('EmpresaConfigs', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('EmpresaLocais', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('Financeiro', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->belongsTo('Usuarios', [
            'foreignKey' => 'admin_id',
        ]);

        $this->addBehavior('Proffer.Proffer', [
            'logo' => [	// The name of your upload field
                'root' => ROOT . DS . 'webroot' . DS . 'img', // Customise the root upload folder here, or omit to use the default
                'dir' => 'logo_dir',	// The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [	// Define the prefix of your thumbnail
                        'w' => 200,	// Width
                        'h' => 200,	// Height
                        'jpeg_quality'	=> 100
                    ],
                    'portrait' => [		// Define a second thumbnail
                        'w' => 100,
                        'h' => 300
                    ],
                    'mobile' => [			// Create a smaller copy based on width or height that respects ratio
                        'w' => 421,		// Height can be omitted (or vice versa)
                        'upsize' => false	// Prevent the image from being upsized if it is narrower than specified width
                    ]
                ],
                'thumbnailMethod' => 'gd'	// Options are Imagick or Gd
            ]
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
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->scalar('cnpj')
            ->maxLength('cnpj', 18)
            ->allowEmptyString('cnpj');

        $validator
            ->scalar('cpf')
            ->maxLength('cpf', 11)
            ->allowEmptyString('cpf');

        $validator
            ->scalar('telefone')
            ->maxLength('telefone', 15)
            ->requirePresence('telefone', 'create')
            ->notEmptyString('telefone');

        $validator
            ->integer('cidade_id')
            ->requirePresence('cidade_id', 'create')
            ->notEmptyString('cidade_id');

        $validator
            ->scalar('estado')
            ->maxLength('estado', 2)
            ->requirePresence('estado', 'create')
            ->notEmptyString('estado');


        $validator
            ->notEmptyString('logo');

        $validator
            ->scalar('logo_dir')
            ->maxLength('logo_dir', 255)
            ->notEmptyString('logo_dir');

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmptyString('tipo');

        $validator
            ->integer('matriz_id')
            ->allowEmptyString('matriz_id');

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
        $rules->add($rules->existsIn('cidade_id', 'LogLocalidade'), ['errorField' => 'cidade_id']);
        $rules->add($rules->existsIn('matriz_id', 'Empresas'), ['errorField' => 'matriz_id']);

        return $rules;
    }
}
