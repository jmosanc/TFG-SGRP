<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Crear Agricultor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="agricultores index large-10 medium-8 columns content">
    <h3><?= __('Agricultores') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="20px" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido 1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido 2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('direccion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teléfono fijo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tlf. movil') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agricultores as $agricultore): ?>
            <tr>
                <td><?= $this->Number->format($agricultore->id) ?></td>
                <td><?= h($agricultore->dni) ?></td>
                <td><?= h($agricultore->usuario) ?></td>
                <td><?= h($agricultore->nombre) ?></td>
                <td><?= h($agricultore->ape1) ?></td>
                <td><?= h($agricultore->ape2) ?></td>
                <td><?= h($agricultore->direccion) ?></td>
                <td><?= h($agricultore->email) ?></td>
                <td><?= h($agricultore->tlf) ?></td>
                <td><?= h($agricultore->movil) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('V'), ['action' => 'view', $agricultore->id]) ?>
                    <?= $this->Html->link(__('E'), ['action' => 'edit', $agricultore->id]) ?>
                    <?= $this->Form->postLink(__('B'), ['action' => 'delete', $agricultore->id], ['confirm' => __('¿Seguro que desea borrar # {0}?', $agricultore->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pag. {{page}} de {{pages}}, mostrando {{current}} registro(s) out de {{count}} ')]) ?></p>
    </div>
</div>
