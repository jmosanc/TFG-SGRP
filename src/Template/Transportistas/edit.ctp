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
                ['action' => 'delete', $transportista->id],
                ['confirm' => __('¿Seguro que desea eliminar # {0}?', $transportista->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Transportistas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Fincas'), ['controller' => 'Fincas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Finca'), ['controller' => 'Fincas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Zona'), ['controller' => 'Zonas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="transportistas form large-10 medium-8 columns content">
    <?= $this->Form->create($transportista) ?>
    <fieldset>
        <legend><?= __('Editar Transportista') ?></legend>
        <?php
            echo $this->Form->control('dni');
            echo $this->Form->control('usuario');
            echo $this->Form->control('nombre');
            echo $this->Form->control('ape1', ['label' => 'Apellido 1']);
            echo $this->Form->control('ape2', ['label' => 'Apellido 2']);
            echo $this->Form->control('direccion', ['label' => 'Dirección']);
            echo $this->Form->control('email');
            echo $this->Form->control('tlf', ['label' => 'Teléfono']);
            echo $this->Form->control('movil');
            echo $this->Form->control('tipo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
