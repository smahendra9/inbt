<?php
class UsersController extends AppController {
	public $uses = array('User');
	 public function index(){
	    if($this->request->is('post')){
		$this->User->set($this->data);
				if ($this->User->validates()) {
			echo __LINE__;exit;
		// it validated logic
			} else {
				// didn't validate logic
				$errors = $this->User->validationErrors;
				pr($errors);
			}
		}
  	 }
}