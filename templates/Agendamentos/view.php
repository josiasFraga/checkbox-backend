<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agendamento $agendamento
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Agendamento'), ['action' => 'edit', $agendamento->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink(__('Delete Agendamento'), ['action' => 'delete', $agendamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agendamento->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Agendamentos'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Agendamento'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Modulos'), ['controller' => 'Modulos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Modulo'), ['controller' => 'Modulos', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cinco Esses Auditoria'), ['controller' => 'CincoEssesAuditoria', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cinco Esses Auditorium'), ['controller' => 'CincoEssesAuditoria', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="agendamentos view large-9 medium-8 columns content">
    <h3><?= h($agendamento->id) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Empresa') ?></th>
                <td><?= $agendamento->has('empresa') ? $this->Html->link($agendamento->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $agendamento->empresa->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modulo') ?></th>
                <td><?= $agendamento->has('modulo') ? $this->Html->link($agendamento->modulo->id, ['controller' => 'Modulos', 'action' => 'view', $agendamento->modulo->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($agendamento->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Responsavel') ?></th>
                <td><?= $this->Number->format($agendamento->responsavel) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Inicio') ?></th>
                <td><?= h($agendamento->inicio) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Fim') ?></th>
                <td><?= h($agendamento->fim) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Cinco Esses Auditoria') ?></h4>
        <?php if (!empty($agendamento->cinco_esses_auditoria)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Agendamento Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($agendamento->cinco_esses_auditoria as $cincoEssesAuditoria): ?>
                <tr>
                    <td><?= h($cincoEssesAuditoria->id) ?></td>
                    <td><?= h($cincoEssesAuditoria->agendamento_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'CincoEssesAuditoria', 'action' => 'view', $cincoEssesAuditoria->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'CincoEssesAuditoria', 'action' => 'edit', $cincoEssesAuditoria->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'CincoEssesAuditoria', 'action' => 'delete', $cincoEssesAuditoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cincoEssesAuditoria->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
