<?php
//App::uses('AppModel', 'Model');
class Admin extends AppModel {
    var $name = 'Admin';
    

    var $validate = array(
        'username' => array(
            'rule' => 'alphaNumeric',
            'message' => 'You have not entered your name.'
        ),
        'password' => array(
            'rule' => 'alphaNumeric',
            'message' => 'You did not enter a password.'
        )
    );
}