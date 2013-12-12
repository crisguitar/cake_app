<?php

class EntriesController extends AppController {

    public $helpers = array('Html', 'Form', 'Ajax', 'Javascript');

    public $components = array('Session','Paginator');

    public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Entry.creation_date' => 'desc'
        )
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index');
    }

    public function isAuthorized($user) {
        // All registered users can add posts
        if ($this->action === 'add') {
            return true;
        }

        // The owner of a post can edit and delete it
        if (in_array($this->action, array('edit', 'delete'))) {
            $entryId = $this->request->params['pass'][0];
            if ($this->Entry->isOwnedBy($entryId, $user['id'])) {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index() {
        $this->Paginator->settings = $this->paginate;
        $data = $this->Paginator->paginate('Entry');
        $this->set('entries', $data);
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
            // setting current date time
            $this->request->data['Entry']['creation_date'] = date(DATE_ATOM);
            if ($this->Entry->save($this->request->data)) {
                $this->Session->setFlash(__('Your entry has been saved.', 'default',
                             array('class' => 'flash-message text-success')));
                return $this->redirect(array('controller' => 'entries', 'action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add your entry.', 'default',
                             array('class' => 'flash-message text-warning')));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid entry'));
        }

        $entry = $this->Entry->findById($id);
        if (!$entry) {
            throw new NotFoundException(__('Invalid entry'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Entry->id = $id;
            if ($this->Entry->save($this->request->data)) {
                $this->Session->setFlash(__('Your entry has been updated.'));
                return $this->redirect(array('controller' => 'pages', 'action' => 'display'));
            }
            $this->Session->setFlash(__('Unable to update your entry.'));
        }

        if (!$this->request->data) {
            $this->request->data = $entry;
        }
    }
}