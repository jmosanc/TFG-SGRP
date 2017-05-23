<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Crear Transportista'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Fincas'), ['controller' => 'Fincas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Finca'), ['controller' => 'Fincas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Zona'), ['controller' => 'Zonas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transportistas index large-10 medium-8 columns content">
    <h3><?= __('Transportistas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="20px" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dni') ?></th>
                <th scope="col"><?= $this->Paginator->sort('usuario') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido 1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('apellido 2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dirección') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('teléfono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('movil') ?></th>
                <!--<th scope="col"><?//= $this->Paginator->sort('tipo') ?></th>-->
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transportistas as $transportista): ?>
            <tr>
                <td><?= $this->Number->format($transportista->id) ?></td>
                <td><?= h($transportista->dni) ?></td>
                <td><?= h($transportista->usuario) ?></td>
                <td><?= h($transportista->nombre) ?></td>
                <td><?= h($transportista->ape1) ?></td>
                <td><?= h($transportista->ape2) ?></td>
                <td><?= h($transportista->direccion) ?></td>
                <td><?= h($transportista->email) ?></td>
                <td><?= h($transportista->tlf) ?></td>
                <td><?= h($transportista->movil) ?></td>
                <!--<td><?//= h($transportista->tipo) ?></td>-->
                <td class="actions">
                    <?= $this->Html->link(__('E'), ['action' => 'edit', $transportista->id]) //falta arriba<?= $this->Html->link(__('V'), ['action' => 'view', $transportista->id])  ?>
                    <?= $this->Form->postLink(__('B'), ['action' => 'delete', $transportista->id], ['confirm' => __('¿Seguro que desea eliminar # {0}?', $transportista->id)]) ?>
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
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pag. {{page}} de {{pages}}, mostrando {{current}} registros(s) de {{count}} ')]) ?></p>
    </div>
</div>
