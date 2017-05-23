<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Transportistas Model
 *
 * @property \Cake\ORM\Association\HasMany $Fincas
 * @property \Cake\ORM\Association\HasMany $Zonas
 *
 * @method \App\Model\Entity\Transportista get($primaryKey, $options = [])
 * @method \App\Model\Entity\Transportista newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Transportista[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Transportista|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Transportista patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Transportista[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Transportista findOrCreate($search, callable $callback = null, $options = [])
 */
class TransportistasTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('transportistas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Fincas', [
            'foreignKey' => 'transportista_id'
        ]);
   
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('dni');

        $validator
            ->allowEmpty('usuario');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('ape1');

        $validator
            ->allowEmpty('ape2');

        $validator
            ->allowEmpty('direccion');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('tlf');

        $validator
            ->allowEmpty('movil');

        $validator
            ->allowEmpty('tipo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
