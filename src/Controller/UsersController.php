<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Controller\Component\PaginatorComponent;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public $paginate = [
        'limit' => 1,
    ];

    public function initialize(){
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Search.Prg', [
            'actions' => ['profile']
        ]);
        $this->loadComponent('Paginator');
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'logout']);
    }


    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } 
            $this->Flash->error(__('Invalid username or password, try again'));
        }

        $this->viewBuilder()->layout('mylayout_login');

    }

    public function profile()
    {

        //$lol = $this->Users->get($id,[
          //  'contain' => ["AlumniProfiles", "EducationalBackgrounds", "CompanyDetails"]
        //]);
        //debug($user->alumni_profiles[0]->fname);
        //exit;

        $this->paginate =[
            'contain'   => ["AlumniProfiles", "EducationalBackgrounds", "CompanyDetails"]   //with artists We also fetch pictures
        ];
        $this->set('users', $this->Paginator->paginate($this->Users));
        //$this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);


        //$users = $this->paginate($this->Users);

        //$this->set('userdata',$user);
        //$this->set(compact('users'));
        //$this->set('_serialize', ['users']);

        //$this->loadModel('AlumniProfiles');
        //$alumniprofile = $this->AlumniProfiles->find('all');
               $query = $this->Users
        ->find('search', $this->Users->filterParams($this->request->query))
        ->where(['username IS NOT' => null]);
        $this->set('users', $this->paginate($query));
        $this->viewBuilder()->layout('mylayout'); 

    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
        $this->viewBuilder()->layout('mylayout'); 

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data,['associated' => ["AlumniProfiles", "EducationalBackgrounds", "CompanyDetails"]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        //Cities
        $this->loadModel('Cities'); 
        $this->set('data', $this->Cities->find('list', array(
         
            'field' => array('name'),
            'order' => array('Cities.name'=>'ASC')
        )));

        //Acad Level
        $this->loadModel('AcademicLevels'); 
        $this->set('acad', $this->AcademicLevels->find('list', array(
         
            'field' => array('level'),
            'order' => array('AcademicLevels.level'=>'ASC')
        )));

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->viewBuilder()->layout('mylayout'); 
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ["AlumniProfiles", "EducationalBackgrounds", "CompanyDetails"]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data,['associated' => ["AlumniProfiles", "EducationalBackgrounds", "CompanyDetails"]]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'profile']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        //Cities
        $this->loadModel('Cities'); 
        $this->set('data', $this->Cities->find('list', array(
         
            'field' => array('name'),
            'order' => array('Cities.name'=>'ASC')
        )));

        //Acad Level
        $this->loadModel('AcademicLevels'); 
        $this->set('acad', $this->AcademicLevels->find('list', array(
         
            'field' => array('level'),
            'order' => array('AcademicLevels.level'=>'ASC')
        )));

        $this->loadModel('AlumniProfiles');
        $alumniprofile = $this->AlumniProfiles->find('all');

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $this->viewBuilder()->layout('mylayout'); 

        $this->set(compact('alumniprofile'));
        $this->set('_serialize', ['alumniprofile']);
        //$this->set('alumniprofile', $this->paginate($query));

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

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'register']);
            }
            $this->Flash->error(__('Unable to add the user.'));
        }
        $this->set('user', $user);
    }

    public function dashboard(){//Dashboard
        $users = $this->Users->find('all');
        $this->set(compact('users'));
        $this->viewBuilder()->layout('mylayout');     
    }

    public function import(){//Import
        $users = $this->Users->find('all');
        $this->set(compact('users'));
        $this->viewBuilder()->layout('mylayout');  
    }
}
