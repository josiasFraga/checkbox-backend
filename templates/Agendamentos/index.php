<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agendamento[]|\Cake\Collection\CollectionInterface $agendamentos
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('New Agendamento'), ['action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Modulos'), ['controller' => 'Modulos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Modulo'), ['controller' => 'Modulos', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cinco Esses Auditoria'), ['controller' => 'CincoEssesAuditoria', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cinco Esses Auditorium'), ['controller' => 'CincoEssesAuditoria', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('empresa_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('modulo_id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('inicio') ?></th>
        <th scope="col"><?= $this->Paginator->sort('fim') ?></th>
        <th scope="col"><?= $this->Paginator->sort('responsavel') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($agendamentos as $agendamento) : ?>
        <tr>
            <td><?= $this->Number->format($agendamento->id) ?></td>
            <td><?= $agendamento->has('empresa') ? $this->Html->link($agendamento->empresa->id, ['controller' => 'Empresas', 'action' => 'view', $agendamento->empresa->id]) : '' ?></td>
            <td><?= $agendamento->has('modulo') ? $this->Html->link($agendamento->modulo->id, ['controller' => 'Modulos', 'action' => 'view', $agendamento->modulo->id]) : '' ?></td>
            <td><?= h($agendamento->inicio) ?></td>
            <td><?= h($agendamento->fim) ?></td>
            <td><?= $this->Number->format($agendamento->responsavel) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $agendamento->id], ['title' => __('View'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $agendamento->id], ['title' => __('Edit'), 'class' => 'btn btn-secondary']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $agendamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agendamento->id), 'title' => __('Delete'), 'class' => 'btn btn-danger']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('«', ['label' => __('First')]) ?>
        <?= $this->Paginator->prev('‹', ['label' => __('Previous')]) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next('›', ['label' => __('Next')]) ?>
        <?= $this->Paginator->last('»', ['label' => __('Last')]) ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>
