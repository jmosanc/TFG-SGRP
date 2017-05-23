<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Finca Entity
 *
 * @property int $id
 * @property string $prov
 * @property string $municipio
 * @property string $paraje
 * @property string $poligono
 * @property string $parcela
 * @property int $hectareas
 * @property \Cake\I18n\Time $f_ult_poda
 * @property \Cake\I18n\Time $f_ult_recog
 * @property int $zona_id
 * @property int $transportista_id
 * @property \Cake\I18n\Time $f_asignacionTransp
 * @property int $agricultore_id
 * @property \Cake\I18n\Time $fcomprafinca
 *
 * @property \App\Model\Entity\Zona $zona
 * @property \App\Model\Entity\Transportista $transportista
 * @property \App\Model\Entity\Agricultore $agricultore
 */
class Finca extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
