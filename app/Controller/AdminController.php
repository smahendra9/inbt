<?php
class AdminController extends AppController {
	public $uses = array('User','Category','Admin','Comment','Petition');
	var $components = array('Session','Cms','Paginator');
	
	 public $paginate = array(
        'limit' => 10,
        'order' => array(
            'User.created' => 'desc'
        )
     );
	
	public function beforeFilter() {
        parent::beforeFilter();
		//$this->Auth->authenticate = ClassRegistry::init('Admin');
        //$this->Auth->allow('login');
		$this->layout = 'admin';
    }
	
	public function login(){
		if($this->request->is('post')){
			$this->Admin->set($this->data);
			if ($this->Admin->validates()) {
				$usermame = $this->request->data['Admin']['username'];
				$password = base64_encode($this->request->data['Admin']['password']);
				$data = $this->Admin->find('first',array('conditions'=>array('username'=>$usermame,'password'=>$password)));
				if(!empty($data)){
					$this->Session->write('Admin',$data);
					$this->redirect('mangeuser');
				}else{
					$this->Session->setFlash('Invalid Username Password');
				}
			}else{
				$errors = $this->User->validationErrors;
				pr($errors);
			}
		}
	}
	
	public function logout(){
		$this->Session->destroy('Admin');
		$this->redirect('login');
	}
	
	/*********************** START USER MANAGEMENT **************************/
	public function mangeuser(){
	   $this->Cms->isLoggedin();	
	   	$this->Paginator->settings = $this->paginate;
		// similar to findAll(), but fetches paged results
		$users = $this->Paginator->paginate('User');
		$this->set(array('users'=>$users));
  	}
	
	public function deleteuser(){
		$this->Cms->isLoggedin();
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$data['User']['id'] = $id;
			$data['User']['status'] = 'Inactive';
			$this->User->save($data);
			$this->Session->setFlash('User Successfully deleted.');
			$this->redirect('mangeuser');
		}
	}
	
	public function edituser(){
		$this->Cms->isLoggedin();
		 if(!empty($this->request->data)){
		 	$this->User->set($this->data);
			if ($this->User->validates()) {
			    $user = $this->data;
				$user['User']['password'] = base64_encode($user['User']['password']);
				$this->User->save($user);
				$this->Session->setFlash('User Successfully updated.');
				$this->redirect('mangeuser');
			}
		}		
		
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$user =  $this->User->find('first',array('conditions'=>array('id'=>$id)));
			$user['User']['password'] = base64_decode($user['User']['password']);
			$this->data = $user;
			$this->User->set($this->data);
		}
	}
	/*********************** END USER MANAGEMENT **************************/
	
	/*********************** START CATEGORY MANAGEMENT **************************/
	
	public function managecategory(){
		$this->Cms->isLoggedin();
		$category = $this->Category->generateTreeList(
         null,
        null,
          null,
          '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        );
		
		$catall = $this->Category->find('all');
		$catlist = array();
		foreach($catall as $data){
			$catlist[$data['Category']['id']] = $data;	
		}
		$this->set(array('category'=>$category,'catlist'=>$catlist));
	
	}
	
	public function editcategory(){
		if(!empty($this->request->data)){
		 	$this->Category->set($this->data);
			$this->Category->save(); 
			$this->redirect('managecategory');
		}
		
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$catdetail = $this->Category->getPath($id);	
			$catdetail = end($catdetail);
			$this->data = $catdetail;
			$this->Category->set($this->data);
		}
	}

	public function addcategory(){
		$this->Cms->isLoggedin();
		if(!empty($this->request->data)){
		 	$this->Category->set($this->data);
			$this->Category->save(); 
			$this->redirect('managecategory');
		}
		
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$this->set(array('id'=>$id));
		}
	}
	
	public function deletecategory(){
		$this->Cms->isLoggedin();
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$catdetails = $this->Category->children($id);	
			foreach($catdetails as $cat){
				$this->Category->delete($cat['Category']['id']);
			}
			$this->Category->delete($id);
			$this->redirect('managecategory');
		}
		exit;
	}
	
	/*********************** END CATEGORY MANAGEMENT **************************/
	
	
	/************************ START COMMENT MANAGEMENT **************************/
	public function managecomment(){
		$this->Cms->isLoggedin();
		$this->Paginator->settings = array(
					'limit' => 10,
					'conditions' =>array('Comment.status'=>'Active'),
					'order' => array(
						'Comment.created' => 'desc'
					)
				 );
		$comments = $this->Paginator->paginate('Comment');
		$this->set(array('comments'=>$comments));
	}
	
	public function deletecomment(){
		$this->Cms->isLoggedin();
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$data['Comment']['id'] = $id;
			$data['Comment']['status'] = 'Inactive';
			$this->Comment->save($data);
			$this->Session->setFlash('Comment Successfully deleted.');
			$this->redirect('managecomment');
		}
	}
	
	/************************* END COMMENT MANAGEMENT ***********************/
	
	/************************ START PETITION MANAGEMENT **************************/
	public function managepetition(){
		$this->Cms->isLoggedin();	
		$this->Paginator->settings = array(
					'limit' => 10,
					'order' => array(
						'Petition.created' => 'desc'
					)
				 );
		$petitions = $this->Paginator->paginate('Petition');
		$this->set(array('petitions'=>$petitions));	
	}
	
	public function editpetition(){
		$this->Cms->isLoggedin();
		
		if(!empty($this->request->data)){
		 	$this->Petition->set($this->data);
			$this->Petition->save(); 
			$this->redirect('managepetition');
		}
		
		
		if(isset($this->params['pass'][0])){
			$id = $this->params['pass'][0];
			$petition = $this->Petition->find('first',array('conditions'=>array('Petition.id'=>$id)));
			$this->data = $petition;
			
			$query = null;
			if($petition['Petition']['language']=='ARA'){
				$query = '{n}.Category.ara_name';
			}
			$users = $this->User->find('list',array('conditions'=>array('User.status'=>'Active'),'fields'=>array('User.id','User.name')));
			$category = $this->Category->generateTreeList(
				 null,
				null,
				  $query,
				  '- - - '
				);
			
			$this->Petition->set($petition);
			$this->set(array('category'=>$category));	
			$this->set(array('users'=>$users));	
		}
	}
	
	/************************ END PETITION MANAGEMENT **************************/
	
}
