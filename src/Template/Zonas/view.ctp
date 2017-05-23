<?php
/**
  * @var \App\View\AppView $this
  */
if ( $this->request->session()->read('user_role') == 'a' ){ //menu admin ?>  

<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Zona'), ['action' => 'edit', $zona->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zona'), ['action' => 'delete', $zona->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zona->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Zona'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<?php
} //end admin
else if ( $this->request->session()->read('user_role') == 't' or $this->request->session()->read('user_role') == 'agr' ){ //menu transportista ?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Listar Zonas'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<?php 
} //end transportista ?>

<div class="zonas view large-10 medium-8 columns content">
    <h3><?= h($zona->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= h($zona->municipio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poligono') ?></th>
            <td><?= h($zona->poligono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transportista') ?></th>
            <td><?= $zona->has('transportista') ? $this->Html->link($zona->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $zona->transportista->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($zona->id) ?></td>
        </tr>
    </table>
</div>
