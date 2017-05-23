<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Workreport Entity
 *
 * @property int $id
 * @property int $finca_id
 * @property int $transportista_id
 * @property \Cake\I18n\Time $fecha_ult_recog
 *
 * @property \App\Model\Entity\Finca $finca
 * @property \App\Model\Entity\Transportista $transportista
 */
class Workreport extends Entity
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
