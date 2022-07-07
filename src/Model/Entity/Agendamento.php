<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Agendamento Entity
 *
 * @property int $id
 * @property int $empresa_id
 * @property int $modulo_id
 * @property \Cake\I18n\FrozenTime|null $inicio
 * @property \Cake\I18n\FrozenTime|null $fim
 * @property int|null $responsavel
 *
 * @property \App\Model\Entity\Empresa $empresa
 * @property \App\Model\Entity\Modulo $modulo
 * @property \App\Model\Entity\CincoEssesAuditorium[] $cinco_esses_auditoria
 */
class Agendamento extends Entity
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
        'empresa_id' => true,
        'modulo_id' => true,
        'inicio' => true,
        'fim' => true,
        'responsavel' => true,
        'empresa' => true,
        'modulo' => true,
        'cinco_esses_auditoria' => true,
    ];
}
