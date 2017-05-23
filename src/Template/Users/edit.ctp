<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('¿Seguro que deseas eliminar # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Usuarios'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Editar Usuario') ?></legend>
        <?php
            echo $this->Form->control('username',['label' => 'Nombre de usuario']);
            echo $this->Form->control('password', ['label' => 'Contraseña']);
            echo $this->Form->control('role', ['label' => 'Tipo de usuario (a: admin, agr: agricultor, t: transportista)']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
