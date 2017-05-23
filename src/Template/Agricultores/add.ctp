<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Agricultores'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="agricultores form large-10 medium-8 columns content">
    <?= $this->Form->create($agricultore) ?>
    <fieldset>
        <legend><?= __('Crear Agricultor') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('usuario', ['label' => 'Usuario: este usuario se lo debe proporcionar la empresa']);
            echo $this->Form->control('nombre');
            echo $this->Form->control('ape1', ['label' => 'Apellido 1']);
            echo $this->Form->control('ape2', ['label' => 'Apellido 2']);
            echo $this->Form->control('direccion', ['label' => 'Dirección']);
            echo $this->Form->control('email');
            echo $this->Form->control('tlf', ['label' => 'Teléfono fijo']);
            echo $this->Form->control('movil', ['label' => 'Teléfono móvil']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
