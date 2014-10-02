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
    /**
     * Config layout for user and admin
     */
    
    public function beforeFilter() {
        //parent::beforeFilter();
        
        /**
         * Không áp dụng cho các function trong mảng này
         */
        $excludeFunctions = array('admin_login', 'admin_logout');
        
        if($this->params['prefix'] == "admin" && isset($this->params["prefix"])){
            //$this->layout = "admin";
            if($this->__adminAuthCheck() === TRUE){
                $this->layout = "admin";
            }elseif (!in_array($this->action, $excludeFunctions)) {
                $this->redirect(SITE_URL);
            }
        }else{
            
        }
    }
    
    /**
     * Check Admin authentication
     * 
     * @return boolean Auth or Un-auth
     */
    private function __adminAuthCheck(){
        $session = $this->Session->read('UserSession');
        
        if(isset($session["isLogin"])
            && $session["isLogin"] === TRUE
            && $session["isAdmin"] === 1
        ){
            return TRUE;
        }
        
        return FALSE;
    }
}
