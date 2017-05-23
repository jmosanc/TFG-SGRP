<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fincas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Zonas
 * @property \Cake\ORM\Association\BelongsTo $Transportistas
 * @property \Cake\ORM\Association\BelongsTo $Agricultores
 *
 * @method \App\Model\Entity\Finca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Finca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Finca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Finca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Finca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Finca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Finca findOrCreate($search, callable $callback = null, $options = [])
 */
class FincasTable extends Table
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

        $this->setTable('fincas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Zonas', [
            'foreignKey' => 'zona_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Transportistas', [
            'foreignKey' => 'transportista_id'
        ]);
        $this->belongsTo('Agricultores', [
            'foreignKey' => 'agricultore_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('prov');

        $validator
            ->allowEmpty('municipio');

        $validator
            ->allowEmpty('paraje');

        $validator
            ->allowEmpty('poligono');

        $validator
            ->allowEmpty('parcela');

        $validator
            ->integer('hectareas')
            ->allowEmpty('hectareas');

        $validator
            ->date('f_ult_poda')
            ->allowEmpty('f_ult_poda');

        $validator
            ->date('f_ult_recog')
            ->allowEmpty('f_ult_recog');

        $validator
            ->date('f_asignacionTransp')
            ->allowEmpty('f_asignacionTransp');

        $validator
            ->date('fcomprafinca')
            ->requirePresence('fcomprafinca', 'create')
            ->notEmpty('fcomprafinca');

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
        $rules->add($rules->existsIn(['zona_id'], 'Zonas'));
        $rules->add($rules->existsIn(['transportista_id'], 'Transportistas'));
        $rules->add($rules->existsIn(['agricultore_id'], 'Agricultores'));

        return $rules;
    }
}
