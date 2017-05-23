<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agricultore Entity
 *
 * @property int $id
 * @property string $dni
 * @property string $usuario
 * @property string $nombre
 * @property string $ape1
 * @property string $ape2
 * @property string $direccion
 * @property string $email
 * @property string $tlf
 * @property string $movil
 */
class Agricultore extends Entity
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
