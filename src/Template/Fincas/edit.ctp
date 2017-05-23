<?php
/**
  * @var \App\View\AppView $this
  */
  
if ( $this->request->session()->read('user_role') == 'a' ){ //menu admin ?>  

<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $finca->id],
                ['confirm' => __('¿Seguro que quieres borrar la finca # {0}?', $finca->id)]
            )
        ?></li>
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Fincas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Zona'), ['controller' => 'Zonas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Transportistas'), ['controller' => 'Transportistas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Transportista'), ['controller' => 'Transportistas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Agricultores'), ['controller' => 'Agricultores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Agricultor'), ['controller' => 'Agricultores', 'action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Informe de trabajo'), ['controller' => 'Fincas', 'action' => 'workreport']) ?></li>
    </ul>
  </nav>
<?php
} //end admin
else if ( $this->request->session()->read('user_role') == 'agr' ){ //menu agricultores ?>
 <nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Fincas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Zonas'), ['controller' => 'Zonas', 'action' => 'index']) ?></li>
    </ul>
  </nav>
  <?php 
} //end agricultores ?>

<div class="fincas form large-10 medium-8 columns content">
    <?= $this->Form->create($finca) ?>
    <fieldset>
        <legend><?= __('Editar Finca') ?></legend>
        <?php
		
            echo $this->Form->control('prov', ['label' => 'Provincia']);
            echo $this->Form->control('municipio');
            echo $this->Form->control('poligono');
            echo $this->Form->control('parcela');
			echo $this->Form->control('paraje', ['label' => 'Recinto ']);
            echo $this->Form->control('hectareas');
			echo $this->Form->control('zona_id', ['options' => $zonas]);
			echo __d('default', ($this->Form->control('fcomprafinca', ['label' => 'Fecha de compra de la finca (opcional) '])));
            echo $this->Form->control('f_ult_poda', ['label' => 'Fecha de la última poda, cambiando este campo se solicita la recogida', 'empty' => true] );
            echo $this->Form->control ('agricultore_id', ['default' => $this->request->session()->read('agricultore_id') , 'label' => 'Agricultor_id'] );
			if ( $this->request->session()->read('user_role') == 'a'  ){ //only if 'admin' 
				echo $this->Form->control('f_ult_recog', ['label' => 'Fecha de la última recogida de restos, este campo lo actualiza el transportista una vez recoge los restos'], ['empty' => true], ['label' => 'Fecha de la última recogida']);
				echo $this->Form->control('transportista_id', ['options' => $transportistas, 'empty' => true]);
				echo $this->Form->control('f_asignacionTransp', ['label' => 'Fecha de asignación de transportista (opcional) '], ['empty' => true]);
	        }           
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar')) ?>
    <?= $this->Form->end() ?>
</div>
