<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Workreport'), ['action' => 'edit', $workreport->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Workreport'), ['action' => 'delete', $workreport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workreport->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Workreports'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Workreport'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fincas'), ['controller' => 'Fincas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Finca'), ['controller' => 'Fincas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="workreports view large-9 medium-8 columns content">
    <h3><?= h($workreport->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Finca') ?></th>
            <td><?= $workreport->has('finca') ? $this->Html->link($workreport->finca->id, ['controller' => 'Fincas', 'action' => 'view', $workreport->finca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transportista') ?></th>
            <td><?= $workreport->has('transportista') ? $this->Html->link($workreport->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $workreport->transportista->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($workreport->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Ult Recog') ?></th>
            <td><?= h($workreport->fecha_ult_recog) ?></td>
        </tr>
    </table>
</div>
