<?php
/**
  * Created for users management (jesusm)
  */
?>
<!-- File: src/Template/Users/login.ctp -->

<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>

    <fieldset>
        <legend><?= __('Por favor, introduzca sus datos de acceso') ?></legend>
        <?= $this->Form->input('username',['label' => 'Usuario']); ?>
        <?= $this->Form->input('password',['label' => 'Contraseña']); ?>
<?= $this->Form->button(__('Entrar')); ?>
<?= $this->Form->end() ?>
</div>