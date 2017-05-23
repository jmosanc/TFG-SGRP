<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; //jesusm

/**
 * Transportistas Controller
 *
 * @property \App\Model\Table\TransportistasTable $Transportistas
 */
class TransportistasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $transportistas = $this->paginate($this->Transportistas);

        $this->set(compact('transportistas'));
        $this->set('_serialize', ['transportistas']);
    }

    /**
     * View method
     *
     * @param string|null $id Transportista id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transportista = $this->Transportistas->get($id, [
            'contain' => ['Fincas', 'Zonas']
        ]);

        $this->set('transportista', $transportista);
        $this->set('_serialize', ['transportista']);
		
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transportista = $this->Transportistas->newEntity();
        if ($this->request->is('post')) {
            $transportista = $this->Transportistas->patchEntity($transportista, $this->request->getData());
			echo $transportista->id;
            if ( $this->Transportistas->save($transportista) ) {
                $this->Flash->success(__('Se ha creado el transportista.'));
				
				//poner la query para hacer un update a la tabla users campo transportista_id con id=usuario. 
				$id_usr = $transportista->usuario;
				$usersTable = TableRegistry::get('Users');
				$usuario = $usersTable->get($id_usr); // Return usuario with id = $usr (entered by the creator of the transportista in field usuario)				
				$usuario->transportista_id = $transportista->id; //Update user with the link. 
				    if ( $usuario->role == 't' ) {  //check that user role is 't' (transportista)
						if ( $usersTable->save($usuario) ){
					        //$this->Flash->success(__('Usuario asignado con éxito.'));
				            return $this->redirect(['action' => 'index']);
				        }
					}	
				else $this->Flash->error(__('No se ha podido asignar el usuario al transportista. Por favor, inténtelo más tarde'));
            }
            else $this->Flash->error(__('El transportista no pudo crearse. Por favor, inténtelo de nuevo.'));
        }
        $this->set(compact('transportista'));
        $this->set('_serialize', ['transportista']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Transportista id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transportista = $this->Transportistas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transportista = $this->Transportistas->patchEntity($transportista, $this->request->getData());
            if ($this->Transportistas->save($transportista)) {
                $this->Flash->success(__('The transportista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transportista could not be saved. Please, try again.'));
        }
        $this->set(compact('transportista'));
        $this->set('_serialize', ['transportista']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Transportista id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transportista = $this->Transportistas->get($id);
        if ($this->Transportistas->delete($transportista)) {
            $this->Flash->success(__('The transportista has been deleted.'));
        } else {
            $this->Flash->error(__('The transportista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
