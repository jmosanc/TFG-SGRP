<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() //different from specified https://book.cakephp.org/3.0/es/tutorials-and-examples/blog-auth-example/auth.html
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) //I made a mix
    { 
		if (!$id) {
            throw new NotFoundException(__('Usuario no válido'));
        }
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuario creado.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No pudo crearse el usuario. Por favor, pruebe de nuevo.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	//jesusm: there are some differences between my code and the one specified for the controller in https://book.cakephp.org/3.0/es/tutorials-and-examples/blog-auth-example/auth.html
	 public function beforeFilter(Event $event)
    {
		parent::beforeFilter($event);
		// Allow users to register and logout.
		// You should not add the "login" action to allow list. Doing so would
		// cause problems with normal functioning of AuthComponent.
		$this->Auth->allow(['add', 'logout']);
    }
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				
				//$_SESSION		
				$logged_user_details = $this->Auth->user();
				$logged_username = $logged_user_details['username'];
				$logged_user_id = $logged_user_details['id'];
				$logged_user_role = $logged_user_details['role']; // in the view, lateral menu has been filtered by $logged_user_role	 
				$logged_usr_agricultore_id = $logged_user_details['agricultore_id'];
				$logged_usr_transportista_id = $logged_user_details['transportista_id'];
				$logged_usr_role_description='';
				
				$session = $this->request->session();
				$session->write('username', $logged_username);
				$session->write('user_id', $logged_user_id); //in the view it can be read as $this->request->session()->read('user_id')
				$session->write('user_role', $logged_user_role); 
				$session->write('agricultore_id', $logged_usr_agricultore_id); 
				$session->write('transportista_id', $logged_usr_transportista_id); 
				
				if ( $logged_user_role =='a' )
					$logged_usr_role_description = 'administrador'; 
				else if ( $logged_user_role =='agr' )
					$logged_usr_role_description = 'agricultor'; 
				else if ( $logged_user_role =='t' )
					$logged_usr_role_description = 'transportista'; 
				
				$usr_header_txt = "usuario: ".$logged_username." ( ".$logged_usr_role_description." ) " ;
				$session->write('usr_header', $usr_header_txt ); 
							
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__('Contraseña incorrecta, inténtelo de nuevo'));
		}
	}

	public function logout()
	{
    return $this->redirect($this->Auth->logout());
	}
	
}
