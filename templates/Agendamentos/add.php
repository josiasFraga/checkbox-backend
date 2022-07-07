<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Agendamento $agendamento
 * @var \App\Model\Entity\Empresa[]|\Cake\Collection\CollectionInterface $empresas
 * @var \App\Model\Entity\Modulo[]|\Cake\Collection\CollectionInterface $modulos
 * @var \App\Model\Entity\CincoEssesAuditorium[]|\Cake\Collection\CollectionInterface $cincoEssesAuditoria
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('List Agendamentos'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Empresas'), ['controller' => 'Empresas', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Empresa'), ['controller' => 'Empresas', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Modulos'), ['controller' => 'Modulos', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Modulo'), ['controller' => 'Modulos', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Cinco Esses Auditoria'), ['controller' => 'CincoEssesAuditoria', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Cinco Esses Auditorium'), ['controller' => 'CincoEssesAuditoria', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="agendamentos form content">
    <?= $this->Form->create($agendamento) ?>
    <fieldset>
        <legend><?= __('Add Agendamento') ?></legend>
        <?php
            echo $this->Form->control('empresa_id', ['options' => $empresas]);
            echo $this->Form->control('modulo_id', ['options' => $modulos]);
            echo $this->Form->control('inicio');
            echo $this->Form->control('fim');
            echo $this->Form->control('responsavel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
