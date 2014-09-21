<?php
//App::uses('AppModel', 'Model');
class Petition extends AppModel {
    var $name = 'Petition';
    var $belongsTo = array('User','Category');	
}