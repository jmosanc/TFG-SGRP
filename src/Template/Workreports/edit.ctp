<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $workreport->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $workreport->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Workreports'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fincas'), ['controller' => 'Fincas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Finca'), ['controller' => 'Fincas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="workreports form large-9 medium-8 columns content">
    <?= $this->Form->create($workreport) ?>
    <fieldset>
        <legend><?= __('Edit Workreport') ?></legend>
        <?php
            echo $this->Form->control('finca_id', ['options' => $fincas]);
            echo $this->Form->control('transportista_id', ['options' => $transportistas]);
            echo $this->Form->control('fecha_ult_recog');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
