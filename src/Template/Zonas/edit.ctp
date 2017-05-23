<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $zona->id],
                ['confirm' => __('¿Seguro que deseas borrar # {0}?', $zona->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Zonas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zonas form large-10 medium-8 columns content">
    <?= $this->Form->create($zona) ?>
    <fieldset>
        <legend><?= __('Edit Zona') ?></legend>
        <?php
            echo $this->Form->control('municipio');
            echo $this->Form->control('poligono');
            echo $this->Form->control('transportista_id', ['options' => $transportistas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
