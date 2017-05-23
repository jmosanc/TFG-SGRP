<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workreports Controller
 *
 * @property \App\Model\Table\WorkreportsTable $Workreports
 */
class WorkreportsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fincas', 'Transportistas']
        ];
        $workreports = $this->paginate($this->Workreports);

        $this->set(compact('workreports'));
        $this->set('_serialize', ['workreports']);
    }

    /**
     * View method
     *
     * @param string|null $id Workreport id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workreport = $this->Workreports->get($id, [
            'contain' => ['Fincas', 'Transportistas']
        ]);

        $this->set('workreport', $workreport);
        $this->set('_serialize', ['workreport']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workreport = $this->Workreports->newEntity();
        if ($this->request->is('post')) {
            $workreport = $this->Workreports->patchEntity($workreport, $this->request->getData());
            if ($this->Workreports->save($workreport)) {
                $this->Flash->success(__('The workreport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workreport could not be saved. Please, try again.'));
        }
        $fincas = $this->Workreports->Fincas->find('list', ['limit' => 200]);
        $transportistas = $this->Workreports->Transportistas->find('list', ['limit' => 200]);
        $this->set(compact('workreport', 'fincas', 'transportistas'));
        $this->set('_serialize', ['workreport']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Workreport id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workreport = $this->Workreports->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workreport = $this->Workreports->patchEntity($workreport, $this->request->getData());
            if ($this->Workreports->save($workreport)) {
                $this->Flash->success(__('The workreport has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workreport could not be saved. Please, try again.'));
        }
        $fincas = $this->Workreports->Fincas->find('list', ['limit' => 200]);
        $transportistas = $this->Workreports->Transportistas->find('list', ['limit' => 200]);
        $this->set(compact('workreport', 'fincas', 'transportistas'));
        $this->set('_serialize', ['workreport']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Workreport id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workreport = $this->Workreports->get($id);
        if ($this->Workreports->delete($workreport)) {
            $this->Flash->success(__('The workreport has been deleted.'));
        } else {
            $this->Flash->error(__('The workreport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
