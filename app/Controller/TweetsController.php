<?php

class TweetsController extends AppController {
	
	public $helpers = array('Html', 'Form', 'Ajax', 'Javascript');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow(array('hideShowToggle', 'userIsOwner')); 
    }

    public function tweetExists($tweetId) {
        if($this->Tweet->findByTweetId($tweetId)) {
            return true;
        }
        return false;
    }

    public function userIsOwner($tweetId, $userId = '') {
        return $this->Tweet->isOwnedBy($tweetId, $userId);
    }

    public function hideShowToggle($id, $userId) {

    	$this->autoRender = false;
        // ajax action - hide, unhide tweet
    	if ($this->request->is('ajax')) {
    		if ($this->Tweet->findByTweetId($id)) {
                // unhiding tweet
                $this->Tweet->deleteAll(array('Tweet.tweet_id' => $id), false);
    		} else {
    			// hiding tweet
    			$this->Tweet->create();
	    		$this->Tweet->save(
	    			array(
	    				'tweet_id' => $id,
	    				'user_id' => $userId
	    				)
	    			);
    		}
    	}
    }
}