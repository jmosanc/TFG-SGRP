<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zonas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Transportistas
 * @property \Cake\ORM\Association\HasMany $Fincas
 *
 * @method \App\Model\Entity\Zona get($primaryKey, $options = [])
 * @method \App\Model\Entity\Zona newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Zona[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Zona|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Zona patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Zona[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Zona findOrCreate($search, callable $callback = null, $options = [])
 */
class ZonasTable extends Table
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

        $this->setTable('zonas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Transportistas', [
            'foreignKey' => 'transportista_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Fincas', [
            'foreignKey' => 'zona_id'
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
            ->allowEmpty('municipio');

        $validator
            ->allowEmpty('poligono');

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
        $rules->add($rules->existsIn(['transportista_id'], 'Transportistas'));

        return $rules;
    }
}
