<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Agricultor'), ['action' => 'edit', $agricultore->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Agricultor'), ['action' => 'delete', $agricultore->id], ['confirm' => __('Are you sure you want to delete # {0}?', $agricultore->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Agricultores'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Agricultor'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="agricultores view large-10 medium-8 columns content">
    <h3><?= h($agricultore->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Dni') ?></th>
            <td><?= h($agricultore->dni) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Usuario') ?></th>
            <td><?= h($agricultore->usuario) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($agricultore->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido 1') ?></th>
            <td><?= h($agricultore->ape1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Apellido 2') ?></th>
            <td><?= h($agricultore->ape2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dirección') ?></th>
            <td><?= h($agricultore->direccion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($agricultore->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Teléfono fijo') ?></th>
            <td><?= h($agricultore->tlf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Movil') ?></th>
            <td><?= h($agricultore->movil) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($agricultore->id) ?></td>
        </tr>
    </table>
</div>
