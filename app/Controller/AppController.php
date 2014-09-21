<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array('Cookie','Session');
	//set an alias for the newly created helper: Html<->MyHtml
	public $helpers = array('Html' => array('className' => 'MyHtml'));

	public function beforeFilter() {
		
          $this->_setLanguage();
        }

	private function _setLanguage() {
	
		//pr($_SESSION);exit;
        //if the cookie was previously set, and Config.language has not been set

        //write the Config.language with the value from the Cookie
         
        if ($this->Cookie->read('lang') && !$this->Session->check('Config.language')) {

            $this->Session->write('Config.language', $this->Cookie->read('lang'));

        }

        //if the user clicked the language URL

        else if (isset($this->params['named']['language'])) {

            if ($this->params['named']['language'] != $this->Session->read('Config.language')) {

                //then update the value in Session and the one in Cookie

                $this->Session->write('Config.language', $this->params['named']['language']);

                $this->Cookie->write('lang', $this->params['named']['language'], false, '20 days');

            }

        }

    }
	//override redirect
	/*public function redirect( $url, $status = NULL, $exit = true ) {
		if (!isset($url['language']) && $this->Session->check('Config.language')) {
			$url['language'] = $this->Session->read('Config.language');
		}
		parent::redirect($url,$status,$exit);
	}*/
}