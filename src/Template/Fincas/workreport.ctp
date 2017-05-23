<?php
/**
  * @var \App\View\AppView $this
  */
    $this->assign('title', 'Informes');
?>
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
	    <li><?= $this->Html->link(__('Listar Trabajo'), ['controller' => 'Fincas', 'action' => 'worklist']) ?></li>	
      </ul>
	</nav>
<div class="fincas index large-10 medium-8 columns content">
    <h3><?= __('Informe de trabajo') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th width="40px" scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th width="80px" scope="col"><?= $this->Paginator->sort('prov') ?></th>
                <th width="100px" scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th width="80px" scope="col"><?= $this->Paginator->sort('poligono') ?></th>
                <th width="60px" scope="col"><?= $this->Paginator->sort('parcela') ?></th>
                <th scope="col"><?= $this->Paginator->sort('recinto') ?></th>				
                <th width="40px" scope="col"><?= $this->Paginator->sort('Ha') ?></th>
                <th width="80px" scope="col"><?= $this->Paginator->sort('Última Poda') ?></th>
                <th width="80px" scope="col"><?= $this->Paginator->sort('Última Recogida') ?></th>
                <th width="60px" scope="col"><?= $this->Paginator->sort('zona_id') ?></th>
                <th width="100px" scope="col"><?= $this->Paginator->sort('transportista_id') ?></th>
                <th width="100px" scope="col"><?= $this->Paginator->sort('agricultor_id') ?></th>
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
				<td><?= h($finca->zona_id) ?></td>
                <td><?= h($finca->transportista_id) ?></td>
				<td><?= h($finca->agricultore_id) ?></td>
   			    <td class="actions">
                    <?= $this->Html->link(__('V'), ['action' => 'view', $finca->id])  ?>
                    <?= $this->Html->link(__('E'), ['action' => 'edit', $finca->id]) ?>
                    <?= $this->Form->postLink(__('B'), ['action' => 'delete', $finca->id], ['confirm' => __('¿Seguro que quieres borrar la finca # {0}?', $finca->id)]); ?>
				</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> 




