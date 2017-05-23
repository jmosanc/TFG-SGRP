<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Usuario'), ['action' => 'delete', $user->id], ['confirm' => __('¿Seguro que deseas eliminar # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Usuario'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Usuario'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-10 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre de usuario') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Contraseña') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo de usuario: a: administrador, agr: agricultor, t: transportista') ?></th>
            <td><?= h($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de creación') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha de modificación') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
    </table>
</div>
