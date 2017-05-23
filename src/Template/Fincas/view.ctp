<?php
/**
  * @var \App\View\AppView $this
  */
  
if ( $this->request->session()->read('user_role') == 'a' ){ //menu admin ?>

<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Finca'), ['action' => 'edit', $finca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Finca'), ['action' => 'delete', $finca->id], ['confirm' => __('¿Seguro que quieres borrar la finca # {0}?', $finca->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Fincas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Finca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Zona'), ['controller' => 'Zonas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Agricultores'), ['controller' => 'Agricultores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Agricultor'), ['controller' => 'Agricultores', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('Informe de trabajo'), ['controller' => 'Fincas', 'action' => 'workreport']) ?></li>
    </ul>
</nav>
<?php
}
else if ( $this->request->session()->read('user_role') == 't' ){ //menu transportista ?>
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Listar de trabajo'), ['controller' => 'Fincas', 'action' => 'worklist']) ?></li>	
		</ul>
	</nav>
	
<?php } 
elseif ( $this->request->session()->read('user_role') == 'agr' ){ //agricultor ?>
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
        <ul class="side-nav">
          <li class="heading"><?= __('Acciones') ?></li>
          <li><?= $this->Html->link(__('Editar Finca'), ['action' => 'edit', $finca->id]) ?> </li>
          <li><?= $this->Form->postLink(__('Borrar Finca'), ['action' => 'delete', $finca->id], ['confirm' => __('¿Seguro que quieres borrar la finca # {0}?', $finca->id)]) ?> </li>
          <li><?= $this->Html->link(__('Listar Fincas'), ['action' => 'index']) ?> </li>
          <li><?= $this->Html->link(__('Crear Finca'), ['action' => 'add']) ?> </li>
        </ul>
	</nav>
<?php } ?>

<div class="fincas view large-10 medium-8 columns content">
    <h3><?= h($finca->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= h($finca->prov) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Municipio') ?></th>
            <td><?= h($finca->municipio) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Poligono') ?></th>
            <td><?= h($finca->poligono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parcela') ?></th>
            <td><?= h($finca->parcela) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Recinto') ?></th>
            <td><?= h($finca->paraje) ?></td>
        </tr>		
        <tr>
            <th scope="row"><?= __('Zona') ?></th>
            <td><?= $finca->has('zona') ? $this->Html->link($finca->zona->id, ['controller' => 'Zonas', 'action' => 'view', $finca->zona->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Transportista') ?></th>
            <td><?= $finca->has('transportista') ? $this->Html->link($finca->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $finca->transportista->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Agricultore') ?></th>
            <td><?= $finca->has('agricultore') ? $this->Html->link($finca->agricultore->id, ['controller' => 'Agricultores', 'action' => 'view', $finca->agricultore->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($finca->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hectareas') ?></th>
            <td><?= $this->Number->format($finca->hectareas) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('F Ult Poda') ?></th>
            <td><?= h($finca->f_ult_poda) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('F Ult Recog') ?></th>
            <td><?= h($finca->f_ult_recog) ?></td>
        </tr>
    </table>
</div>
