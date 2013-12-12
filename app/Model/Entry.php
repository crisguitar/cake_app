<?php

App::uses('AppModel', 'Model');
class Entry extends AppModel {

	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
    
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );

    public function isOwnedBy($entry, $user) {
        return $this->field('id', array('id' => $entry, 'user_id' => $user)) === $entry;
    }
}