<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $agricultore->id],
                ['confirm' => __('¿Seguro que desea eliminar # {0}?', $agricultore->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Agricultores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="agricultores form large-10 medium-8 columns content">
    <?= $this->Form->create($agricultore) ?>
    <fieldset>
        <legend><?= __('Editar Agricultor') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('usuario');
            echo $this->Form->control('nombre');
            echo $this->Form->control('ape1', ['label' => 'Apellido 1']);
            echo $this->Form->control('ape2', ['label' => 'Apellido 2']);
            echo $this->Form->control('direccion', ['label' => 'Dirección']);
            echo $this->Form->control('email');
            echo $this->Form->control('tlf');
            echo $this->Form->control('movil');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
