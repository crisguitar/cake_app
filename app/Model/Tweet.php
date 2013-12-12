<?php

App::uses('AppModel', 'Model');

class Tweet extends AppModel {

	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );

	// this function helps identifying if the user is the owner of the tweet
    public function isOwnedBy($tweet, $user) {
        return $this->field('tweet_id', array('tweet_id' => $tweet, 'user_id' => $user)) == $tweet;
    }
}