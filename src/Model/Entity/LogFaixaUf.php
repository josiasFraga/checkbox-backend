<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LogFaixaUf Entity
 *
 * @property string $ufe_sg
 * @property string $ufe_no
 * @property string $ufe_rad1_ini
 * @property string $ufe_suf1_ini
 * @property string $ufe_rad1_fim
 * @property string $ufe_suf1_fim
 * @property string|null $ufe_rad2_ini
 * @property string|null $ufe_suf2_ini
 * @property string|null $ufe_rad2_fim
 * @property string|null $ufe_suf2_fim
 */
class LogFaixaUf extends Entity
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
        'ufe_no' => true,
        'ufe_rad1_ini' => true,
        'ufe_suf1_ini' => true,
        'ufe_rad1_fim' => true,
        'ufe_suf1_fim' => true,
        'ufe_rad2_ini' => true,
        'ufe_suf2_ini' => true,
        'ufe_rad2_fim' => true,
        'ufe_suf2_fim' => true,
    ];
}
