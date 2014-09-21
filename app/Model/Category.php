<?php
//App::uses('AppModel', 'Model');
class Category extends AppModel {
    var $name = 'Category';
	public $actsAs = array('Tree');
    /*var $validate = array(
        'name' => array(
            'rule' => 'required',
            'message' => 'You have not entered category name in english.'
        ),
        'ara_name' => array(
            'rule' => 'required',
            'message' => 'This is an invalid category name in arabic.'
        )
        
    );*/
}