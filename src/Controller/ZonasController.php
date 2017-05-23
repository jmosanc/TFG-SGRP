<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; //jesusm

/**
 * Zonas Controller
 *
 * @property \App\Model\Table\ZonasTable $Zonas
 */
class ZonasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		
        $this->paginate = [
            'contain' => ['Transportistas']
        ];
        $zonas = $this->paginate($this->Zonas);

        $this->set(compact('zonas'));
        $this->set('_serialize', ['zonas']);
    }

    /**
     * View method
     *
     * @param string|null $id Zona id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	
        $zona = $this->Zonas->get($id, [
            'contain' => ['Transportistas']
        ]);

        $this->set('zona', $zona);
        $this->set('_serialize', ['zona']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zona = $this->Zonas->newEntity();
        if ($this->request->is('post')) {
            $zona = $this->Zonas->patchEntity($zona, $this->request->getData());
            if ($this->Zonas->save($zona)) {
                $this->Flash->success(__('Zona guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar. Por favor, pruebe de nuevo'));
        }
        $transportistas = $this->Zonas->Transportistas->find('list', ['limit' => 200]);
        $this->set(compact('zona', 'transportistas'));
        $this->set('_serialize', ['zona']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zona id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zona = $this->Zonas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zona = $this->Zonas->patchEntity($zona, $this->request->getData());
            if ($this->Zonas->save($zona)) {
                $this->Flash->success(__('Zona guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se pudo guardar. Por favor, pruebe de nuevo'));
        }
        $transportistas = $this->Zonas->Transportistas->find('list', ['limit' => 200]);
        $this->set(compact('zona', 'transportistas'));
        $this->set('_serialize', ['zona']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zona id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zona = $this->Zonas->get($id);
        if ($this->Zonas->delete($zona)) {
            $this->Flash->success(__('Zona borrada.'));
        } else {
            $this->Flash->error(__('No se pudo borrar. Por favor, pruebe de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
