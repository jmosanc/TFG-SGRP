<?php
/**
  * @var \App\View\AppView $this
  */
  
if ( $this->request->session()->read('user_role') == 'a' ){ //menu admin ?>  
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
			<li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Crear Zona'), ['action' => 'add']) ?></li>
			<li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
			<li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
		</ul>
	</nav>
<?php
} //end admin
else if ( $this->request->session()->read('user_role') == 't' or $this->request->session()->read('user_role') == 'agr' ){ //menu transportista ?>
	<nav class="large-2 medium-4 columns" id="actions-sidebar">
		<ul class="side-nav">
		<?php //no options available ?>
            <li class="heading"><?= __('Acciones') ?></li>
			<li><?= $this->Html->link(__('Listar fincas'), ['controller' => 'Fincas', 'action' => 'index'] ) ?> </li>
		</ul>
	</nav>
<?php 
} //end transportista ?>
<div class="zonas index large-10 medium-8 columns content">
    <h3><?= __('Zonas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('municipio') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poligono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('transportista_id') ?></th>
                <th scope="col" class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zonas as $zona): ?>
            <tr>
                <td><?= $this->Number->format($zona->id) ?></td>
                <td><?= h($zona->municipio) ?></td>
                <td><?= h($zona->poligono) ?></td>
                <td><?= $zona->has('transportista') ? $this->Html->link($zona->transportista->id, ['controller' => 'Transportistas', 'action' => 'view', $zona->transportista->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('V'), ['action' => 'view', $zona->id]);
					if ( $this->request->session()->read('user_role') == 'a'  ){ //only if 'admin'  ?> 
                        <?= $this->Html->link(__('E'), ['action' => 'edit', $zona->id]) ?>
                        <?= $this->Form->postLink(__('B'), ['action' => 'delete', $zona->id], ['confirm' => __('¿Seguro que quieres borrar # {0}?', $zona->id)]) ;
   					} ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Pag. {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} ')]) ?></p>
    </div>
</div>
