<?php

App::uses('TimelineLoader', 'Vendor');

class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
                
	            return $this->redirect($this->Auth->redirect());
	        }
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }
	}

	public function logout() {
	    return $this->redirect($this->Auth->logout());
	}

	public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
        }
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }

        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $user);
        $myTimeline = new TimelineLoader;
        $json = $myTimeline::getUserTimeline($user['User']['twitter_username']);
        $tweets = json_decode($json, true);
        $this->set('tweets', $tweets);
    }

}