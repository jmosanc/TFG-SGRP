<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry; //jesusm
use Cake\I18n\Time;
use Cake\I18n\I18n;
I18n::locale('es_ES');

/**
 * Fincas Controller
 *
 * @property \App\Model\Table\FincasTable $Fincas
 */
class FincasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		
        $this->paginate = [
            'contain' => ['Zonas', 'Transportistas', 'Agricultores']
        ];
        
		//debug($this->request->session()->read('user_role'));
		
		if ( ($this->request->session()->read('user_role')) == 'a' ) 
		   $fincas = $this->paginate($this->Fincas);
	    else if ($this->request->session()->read('user_role') == 'agr' ){
			$query = $this->Fincas->find('all')->where(['agricultore_id' => $this->request->session()->read('user_id')]);
			$fincas = $this->paginate($query);
		}
		else if ( $this->request->session()->read('user_role') == 't' )
			return $this->redirect(['action' => 'worklist']);
		
        $this->set(compact('fincas'));
        $this->set('_serialize', ['fincas']);
    }

    /**
     * View method
     *
     * @param string|null $id Finca id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
		
        $finca = $this->Fincas->get($id, [
            'contain' => ['Zonas', 'Transportistas', 'Agricultores']
        ]);

        $this->set('finca', $finca);
        $this->set('_serialize', ['finca']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {	
		
        $finca = $this->Fincas->newEntity();
        if ($this->request->is('post')) {
            $finca = $this->Fincas->patchEntity($finca, $this->request->getData());
            if ($this->Fincas->save($finca)) {
                $this->Flash->success(__('finca guardada.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('no pudo guardarse la finca. Por favor, pruebe de nuevo.'));
        }
        $zonas = $this->Fincas->Zonas->find('list', ['limit' => 200]);
        $transportistas = $this->Fincas->Transportistas->find('list', ['limit' => 200]);
        $agricultores = $this->Fincas->Agricultores->find('list', ['limit' => 200]);
        $this->set(compact('finca', 'zonas', 'transportistas', 'agricultores'));
        $this->set('_serialize', ['finca']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Finca id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		
        $finca = $this->Fincas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $finca = $this->Fincas->patchEntity($finca, $this->request->getData());
            if ($this->Fincas->save($finca)) {
                $this->Flash->success(__('The finca has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The finca could not be saved. Please, try again.'));
        }
        $zonas = $this->Fincas->Zonas->find('list', ['limit' => 200]);
        $transportistas = $this->Fincas->Transportistas->find('list', ['limit' => 200]);
        $agricultores = $this->Fincas->Agricultores->find('list', ['limit' => 200]);
        $this->set(compact('finca', 'zonas', 'transportistas', 'agricultores'));
        $this->set('_serialize', ['finca']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Finca id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		
		$this->request->allowMethod(['post', 'delete']);
        $finca = $this->Fincas->get($id);
        if ($this->Fincas->delete($finca)) {
            $this->Flash->success(__('La finca ha sido borrada.'));
        } else {
            $this->Flash->error(__('Error al borrar la finca, Por favor, pruebe de nuevo.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
    /**
     * Worklist method : jesusm 
     * List 'fincas' to be picked up by 'transportista' f.poda > f.recogida
     * @return \Cake\Network\Response|null
     */
    public function worklist()
    {	
		
		$result = array(); // para meter los resultados
		$worklist = TableRegistry::get('Fincas'); 
		
		if ( $this->request->session()->read('user_role') == 'a' ) //admin

			$query = $worklist // Start a new query.
				->find()  // I can do in a controller $query = $worklist->find();
				->select(['id', 'prov', 'municipio', 'paraje', 'poligono', 'parcela', 'f_ult_poda' , 'f_ult_recog' , 'zona_id', 'transportista_id', 'agricultore_id'])
				//->where (['f_ult_poda =' => '20170215' ]) //esto funciona pero esto no: //->where (['f_ult_poda >' => 'f_ult_recog' ])
				->order (['municipio' => 'ASC' ]);
		
		else $query = $worklist // Start a new query.
				->find()  // I can do in a controller $query = $worklist->find();
				->select(['id', 'prov', 'municipio', 'paraje', 'poligono', 'parcela', 'f_ult_poda' , 'f_ult_recog' , 'zona_id', 'transportista_id', 'agricultore_id'])
				->where (['transportista_id =' => $this->request->session()->read('user_id') ]) 
				->order (['municipio' => 'ASC' ]);
				
		foreach ($query as $worklist) {
		  if ( $worklist->f_ult_poda > $worklist->f_ult_recog )
       	     //debug($worklist); 
			 $result[] = $worklist;
		  }  
				
        //$this->set('finca', $query); //pasa la consulta SQL
		//$this->set('finca', $worklist); //pasa solo un valor ya que no es un vector
		
		$this->set('finca', $result);
        //echo '<pre>',print_r($result,1),'</pre>'; // equivalent to print_r ($result);
		
	    $this->paginate = [
            'contain' => ['Zonas', 'Transportistas', 'Agricultores']
        ];
        //$fincas = $this->paginate($this->Fincas);
		$fincas = $result;//$this->paginate($this->Fincas);

        $this->set(compact('fincas'));
        $this->set('_serialize', ['fincas']); 
    }

/**
     * Complete method jesusm : once a 'transportista' pick up the rests from the 'finca' he notice it to the system by this method
     *
     * @param string|null $id Finca id.
     * @return \Cake\Network\Response|null Redirects to worklist to see the remaining work to be completed.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function complete($id = null)
    {
		
		$this->request->allowMethod(['post', 'delete']);
        $idfinca = $this->Fincas->get($id);

		$fincasTable = TableRegistry::get('Fincas');
		$finca = $fincasTable->get($idfinca->id); // Return finca with id chosen

		$time = Time::now();
		$f_ult_recog = $time->format('Y-m-d');
		$finca->f_ult_recog = $f_ult_recog; //set current date
		
		//insert to report table: rm if prob
		$workreportsTable = TableRegistry::get('Workreports');
		$report_line = $workreportsTable->newEntity();
		$report_line->finca_id = $idfinca->id;
		$report_line->transportista_id = $this->request->session()->read('user_id');
		$report_line->fecha_ult_recog = $f_ult_recog;
		$workreportsTable->save($report_line);
			
		if ( $fincasTable->save($finca) ){
			$this->Flash->success(__('Finca marcada como recogida.'));
		}	
		else
	        $this->Flash->error(__('No se ha podido marcar la finca como recogida.'));
		
        return $this->redirect(['action' => 'worklist']);
    }
	
	/**
     * Complete method jesusm : query on work done by transportistas
     *
     * @param string|null $id Finca id.
     * @return \Cake\Network\Response|null Redirects to worklist to see the remaining work to be completed.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function workreport()
    {

		$result = array(); // para meter los resultados
		$report = TableRegistry::get('Fincas'); 
		
			$query = $report // Start a new query.
				->find()  // I can do in a controller $query = $report->find();
				->select(['id', 'prov', 'municipio', 'paraje', 'poligono', 'parcela', 'f_ult_poda' , 'f_ult_recog' , 'zona_id', 'transportista_id', 'agricultore_id'])
				->order (['f_ult_recog' => 'DESC' ]);
		 		
			foreach ($query as $report) {
				 if ( $report->f_ult_poda < $report->f_ult_recog )
				    $result[] = $report;
			}
         		  
		$this->set('finca', $result);
		
	    $this->paginate = [
            'contain' => ['Zonas', 'Transportistas', 'Agricultores']
        ];
		$fincas = $result;//$this->paginate($this->Fincas);

        $this->set(compact('fincas'));
        $this->set('_serialize', ['fincas']);  
		
    }
	
}
