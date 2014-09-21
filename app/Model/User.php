<?php
//App::uses('AppModel', 'Model');
class User extends AppModel {
    var $name = 'User';
    var $validate = array(
        'name' => array(
            'rule' => 'alphaNumeric',
            'message' => 'You have not entered your name.'
        ),
        'email' => array(
            'rule' => 'email',
            'message' => 'This is an invalid e-mail address.'
        ),
        'password' => array(
            'rule' => 'alphaNumeric',
            'message' => 'You did not enter a password.'
        )
    );
}