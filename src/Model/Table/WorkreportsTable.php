<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workreports Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fincas
 * @property \Cake\ORM\Association\BelongsTo $Transportistas
 *
 * @method \App\Model\Entity\Workreport get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workreport newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workreport[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workreport|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workreport patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workreport[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workreport findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkreportsTable extends Table
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

        $this->setTable('workreports');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Fincas', [
            'foreignKey' => 'finca_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Transportistas', [
            'foreignKey' => 'transportista_id',
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
            ->date('fecha_ult_recog')
            ->requirePresence('fecha_ult_recog', 'create')
            ->notEmpty('fecha_ult_recog');

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
        $rules->add($rules->existsIn(['finca_id'], 'Fincas'));
        $rules->add($rules->existsIn(['transportista_id'], 'Transportistas'));

        return $rules;
    }
}
