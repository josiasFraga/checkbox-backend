<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\EmpresasTable&\Cake\ORM\Association\BelongsTo $Empresas
 * @property \App\Model\Table\ColaboradoresTable&\Cake\ORM\Association\HasMany $Colaboradores
 * @property \App\Model\Table\TokensTable&\Cake\ORM\Association\HasMany $Tokens
 * @property \App\Model\Table\UsuarioCcTable&\Cake\ORM\Association\HasMany $UsuarioCc
 * @property \App\Model\Table\UsuarioRecuperacaoSenhaTable&\Cake\ORM\Association\HasMany $UsuarioRecuperacaoSenha
 *
 * @method \App\Model\Entity\Usuario newEmptyEntity()
 * @method \App\Model\Entity\Usuario newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Usuario[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Empresas', [
            'foreignKey' => 'empresa_id',
        ]);
        $this->hasMany('Colaboradores', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->hasMany('Tokens', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->hasMany('UsuarioCc', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->hasMany('UsuarioRecuperacaoSenha', [
            'foreignKey' => 'usuario_id',
        ]);
        $this->hasMany('Empresas', [
            'foreignKey' => 'admin_id',
        ]);
        $this->addBehavior('Proffer.Proffer', [
            'img' => [	// The name of your upload field
                'root' => ROOT . DS . 'webroot' . DS . 'img', // Customise the root upload folder here, or omit to use the default
                'dir' => 'img_dir',	// The name of the field to store the folder
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
            ->integer('empresa_id')
            ->allowEmptyString('empresa_id');

        $validator
            ->scalar('role')
            ->maxLength('role', 50)
            ->notEmptyString('role');

        $validator
            ->scalar('nome')
            ->maxLength('nome', 150)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email')
            ->add('email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Ja existe um usuario registrado com esse e-mail']);

        $validator
            ->scalar('password')
            ->maxLength('password', 100)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('ativo')
            ->notEmptyString('ativo');

        $validator
            ->notEmptyString('img');

        $validator
            ->scalar('img_dir')
            ->maxLength('img_dir', 255)
            ->allowEmptyString('img_dir');

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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);
        $rules->add($rules->existsIn('empresa_id', 'Empresas'), ['errorField' => 'empresa_id']);

        return $rules;
    }
}
