<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zonas form large-9 medium-8 columns content">
    <?= $this->Form->create($zona) ?>
    <fieldset>
        <legend><?= __('Añadir Zona') ?></legend>
        <?php
            echo $this->Form->control('municipio');
            echo $this->Form->control('poligono');
            echo $this->Form->control('transportista_id', ['options' => $transportistas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
