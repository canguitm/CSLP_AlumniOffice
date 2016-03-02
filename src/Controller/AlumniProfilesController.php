<?php
//src/Controller/AlumniProfilesController.php

namespace App\Controller;

class AlumniProfilesController extends AppController{
    
    public function initialize(){
        parent::initialize();
        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Search.Prg', [
            'actions' => ['index']
        ]);
    }

    public function dashboard(){//Dashboard
        $alumniprofile = $this->AlumniProfiles->find('all');
        $this->set(compact('alumniprofile'));
        $this->viewBuilder()->layout('mylayout');    
        $this->set('alumniprofile', $this->paginate()); 
    }
	
    public function index(){//Index
        $this->loadModel('EducationalBackgrounds');
        $educationalbackgrounds = $this->EducationalBackgrounds->find('all');
        
        $this->loadModel('AlumniProfiles');
        $alumniprofile = $this->AlumniProfiles->find('all');
        $this->viewBuilder()->layout('mylayout');    
        
         $query = $this->AlumniProfiles
        ->find('search', $this->AlumniProfiles->filterParams($this->request->query))
        ->where(['fname IS NOT' => null]);
        $this->set('alumniprofile', $this->paginate($query));
    }

    public function import(){//Import
        $alumniprofile = $this->AlumniProfiles->find('all');
        $this->set(compact('alumniprofile'));
        $this->viewBuilder()->layout('mylayout');    
        $this->set('alumniprofile', $this->paginate()); 
    }
	
	public function view($id = null){//View
        $this->loadModel('EducationalBackgrounds');
        $alumniprofile = $this->AlumniProfiles->get($id);
        $this->set(compact('alumniprofile'));

        $educationalbackground = $this->EducationalBackgrounds->find('all');
        $this->set(compact('educationalbackground'));
        $this->viewBuilder()->layout('mylayout');  
    }
	
	public function add(){//Add
        $alumniprofile = $this->AlumniProfiles->newEntity();
        if ($this->request->is('post')) {
            $alumniprofile = $this->AlumniProfiles->patchEntity($alumniprofile, $this->request->data);
            if ($this->AlumniProfiles->save($alumniprofile)) {
                $this->Flash->success(__('Your alumniprofile has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your alumniprofile.'));
        }
        $this->set('alumniprofile', $alumniprofile);
        $this->viewBuilder()->layout('mylayout'); 
    }
	
	public function edit($id = null){//Edit
        $alumniprofile = $this->AlumniProfiles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->AlumniProfiles->patchEntity($alumniprofile, $this->request->data);
            if ($this->AlumniProfiles->save($alumniprofile)) {
                $this->Flash->success(__('Your alumniprofile has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your alumniprofile.'));
        }
        $this->set('alumniprofile', $alumniprofile);
        $this->viewBuilder()->layout('mylayout'); 
	}
	
	public function delete($id){//Delete
        $this->request->allowMethod(['post', 'delete']);
        $alumniprofile = $this->AlumniProfiles->get($id);
        if ($this->AlumniProfiles->delete($alumniprofile)) {
            $this->Flash->success(__('The alumniprofile with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
	}
	
}

