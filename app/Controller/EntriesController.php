<?php

class EntriesController extends AppController {
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function index() {
        $this->set('entries', $this->Entry->find('all'));
    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid entry'));
        }

        $entry = $this->Entry->findById($id);
        if (!$entry) {
            throw new NotFoundException(__('Invalid entry'));
        }
        $this->set('entry', $entry);
    }

    public function add() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Entry->create();
            $this->request->data['Entry']['user_id'] = $this->Auth->user('id');
            if ($this->Entry->save($this->request->data)) {
                $this->Session->setFlash(__('Your entry has been saved.'));
                return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
            }
            $this->Session->setFlash(__('Unable to add your entry.'));
        }
    }
}