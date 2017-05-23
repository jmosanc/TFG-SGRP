<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Workreport'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fincas'), ['controller' => 'Fincas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Finca'), ['controller' => 'Fincas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workreports index large-9 medium-8 columns content">
    <h3><?= __('Workreports') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('finca_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transportista_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_ult_recog') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($workreports as $workreport): ?>
            <tr>
                <td><?= $this->Number->format($workreport->id) ?></td>
                <td><?= $workreport->has('finca') ? $this->Html->link($workreport->finca->id, ['controller' => 'Fincas', 'action' => 'view', $workreport->finca->id]) : '' ?></td>
                <td><?= $workreport->has('transportista') ? $this->Html->link($workreport->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $workreport->transportista->id]) : '' ?></td>
                <td><?= h($workreport->fecha_ult_recog) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $workreport->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $workreport->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $workreport->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workreport->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
