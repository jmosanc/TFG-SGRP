<?php
/**
  * @var \App\View\AppView $this
  */
  
$this->assign('title', 'Fincas');
if ( $this->request->session()->read('user_role') == 'a' ){ //menu admin ?>
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Crear Finca'), ['action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Crear Zona'), ['controller' => 'Zonas', 'action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar Agricultores'), ['controller' => 'Agricultores', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Crear Agricultor'), ['controller' => 'Agricultores', 'action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar de trabajo'), ['controller' => 'Fincas', 'action' => 'worklist']) ?></li>	
			<li><?= $this->Html->link(__('Informe de trabajo'), ['controller' => 'Fincas', 'action' => 'workreport']) ?></li>
		</ul>
	</nav>
<?php
} //end admin
else if ( $this->request->session()->read('user_role') == 't' ){ //menu transportista ?>

	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Listar de trabajo'), ['controller' => 'Fincas', 'action' => 'worklist']) ?></li>	
		</ul>
	</nav>	
<?php 
} //end transportista
else if ( ($this->request->session()->read('user_role')) == 'agr' ){//agricultor ?>
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Crear Finca'), ['action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
		</ul>
	</nav>
<?php 
} //end agricultor
?>


<div class="fincas index large-10 medium-8 columns content">
    <h3><?= __('Fincas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="30px" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prov') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th width="75px" scope="col"><?= $this->Paginator->sort('poligono') ?></th>
                <th width="55px" scope="col"><?= $this->Paginator->sort('parcela') ?></th>
				<th scope="col"><?= $this->Paginator->sort('recinto') ?></th>
                <th width="35px" scope="col"><?= $this->Paginator->sort('Ha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Última poda') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Última recogida') ?></th>
                <th width="55px" scope="col"><?= $this->Paginator->sort('zona_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transportista_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('agricultore_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fincas as $finca): ?>
            <tr>
                <td><?= $this->Number->format($finca->id) ?></td>
                <td><?= h($finca->prov) ?></td>
                <td><?= h($finca->municipio) ?></td>
                <td><?= h($finca->poligono) ?></td>
                <td><?= h($finca->parcela) ?></td>
				<td><?= h($finca->paraje) ?></td>
                <td><?= $this->Number->format($finca->hectareas) ?></td>
                <td><?= h($finca->f_ult_poda) ?></td>
                <td><?= h($finca->f_ult_recog) ?></td>
                <td><?= $finca->has('zona') ? $this->Html->link($finca->zona->id, ['controller' => 'Zonas', 'action' => 'view', $finca->zona->id]) : '' ?></td>
                <td><?= $finca->has('transportista') ? $this->Html->link($finca->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $finca->transportista->id]) : '' ?></td>
                <td><?= $finca->has('agricultore') ? $this->Html->link($finca->agricultore->id, ['controller' => 'Agricultores', 'action' => 'view', $finca->agricultore->id]) : '' ?></td>
                <td class="actions">	
					<?= $this->Html->link(__('V'), ['action' => 'view', $finca->id]);
                    if ( $this->request->session()->read('user_role') == 'a' or $this->request->session()->read('user_role') == 'agr' ){ //only if 'admin' or 'agricultor'	 ?> 	
                    <?= $this->Html->link(__('E'), ['action' => 'edit', $finca->id])  ?>
				    <?= $this->Form->postLink(__('B'), ['action' => 'delete', $finca->id], ['confirm' => __('¿Seguro deseas eliminar # {0}?', $finca->id)]); } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primero')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Pag. {{page}} de {{pages}}, mostrando {{current}} registros(s) de {{count}}')]) ?></p>
    </div>
</div>
