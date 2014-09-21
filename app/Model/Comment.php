<?php
//App::uses('AppModel', 'Model');
class Comment extends AppModel {
    var $name = 'Comment';
    var $belongsTo = array('User');
	public $hasMany = array(
                   'Commentlike' => array(
                      'className' => 'Commentlike',
                      'foreignKey' => 'comment_id',
                      'dependent' => false
                    )
     );
}