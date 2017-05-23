<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; //jesusm

/**
 * Agricultores Controller
 *
 * @property \App\Model\Table\AgricultoresTable $Agricultores
 */
class AgricultoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $agricultores = $this->paginate($this->Agricultores);

        $this->set(compact('agricultores'));
        $this->set('_serialize', ['agricultores']);

    }

    /**
     * View method
     *
     * @param string|null $id Agricultore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agricultore = $this->Agricultores->get($id, [
            'contain' => []
        ]);

        $this->set('agricultore', $agricultore);
        $this->set('_serialize', ['agricultore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agricultore = $this->Agricultores->newEntity();
        if ($this->request->is('post')) {
            $agricultore = $this->Agricultores->patchEntity($agricultore, $this->request->getData());
			echo $agricultore->id;
            if ( $this->Agricultores->save($agricultore) ) {
                $this->Flash->success(__('Se ha creado el agricultor.'));
				
				//poner la query para hacer un update a la tabla users campo agricultore_id con id=usuario. Idem para transportistas
				$id_usr = $agricultore->usuario;
				$usersTable = TableRegistry::get('Users');
				$usuario = $usersTable->get($id_usr); // Return usuario with id = $usr (entered by the creator of the agricultor in field usuario)				
				$usuario->agricultore_id = $agricultore->id; //Update user with the link. 
				    if ( $usuario->role == 'agr' ) {  //check that user role is 'agr' (agricultor)
						if ( $usersTable->save($usuario) ){
					        //$this->Flash->success(__('Usuario asignado con éxito.'));
				            return $this->redirect(['action' => 'index']);
				        }
					}	
				else $this->Flash->error(__('No se ha podido asignar el usuario al agricultor. Por favor, inténtelo más tarde'));
            }
            else $this->Flash->error(__('El agricultor no pudo crearse. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('agricultore'));
        $this->set('_serialize', ['agricultore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Agricultore id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agricultore = $this->Agricultores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agricultore = $this->Agricultores->patchEntity($agricultore, $this->request->getData());
            if ($this->Agricultores->save($agricultore)) {
                $this->Flash->success(__('The agricultore has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agricultore could not be saved. Please, try again.'));
        }
        $this->set(compact('agricultore'));
        $this->set('_serialize', ['agricultore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Agricultore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agricultore = $this->Agricultores->get($id);
        if ($this->Agricultores->delete($agricultore)) {
            $this->Flash->success(__('The agricultore has been deleted.'));
        } else {
            $this->Flash->error(__('The agricultore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
}
