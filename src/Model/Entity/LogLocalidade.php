<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LogLocalidade Entity
 *
 * @property int $loc_nu_sequencial
 * @property string|null $loc_nosub
 * @property string|null $loc_no
 * @property string|null $cep
 * @property string|null $ufe_sg
 * @property int|null $loc_in_situacao
 * @property string $loc_in_tipo_localidade
 * @property int|null $loc_nu_sequencial_sub
 * @property string|null $loc_key_dne
 * @property string|null $temp
 */
class LogLocalidade extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'loc_nosub' => true,
        'loc_no' => true,
        'cep' => true,
        'ufe_sg' => true,
        'loc_in_situacao' => true,
        'loc_in_tipo_localidade' => true,
        'loc_nu_sequencial_sub' => true,
        'loc_key_dne' => true,
        'temp' => true,
    ];
}
