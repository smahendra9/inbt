<?php
class CmsComponent extends Component {
	var $components = array('Session','Admin');
	
	public function startup(Controller $controller) {
    	$this->Controller = $controller;
	}
	public function isLoggedin(){
		$user = $this->Session->read('Admin');
		if(!empty($user)){
			return true;
		}
		return $this->Controller->redirect(array('controller'=>'admin','action'=>'login'));
	}
	
}
