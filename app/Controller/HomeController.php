<?php
class HomeController extends AppController {
    /**
     * User functions
     */
    public function index() {
        //do stuff.
        // main function in Cake
    }
    
    /**
     * Admin functions
     */
    public function admin_index(){
        
        $this->set(array(
            'title_for_layout'
        ), array(
            'Administrator Dashboard'
        ));
    }
    
    public function admin_login(){
        $formData       = $this->request->data;
        $redirectUrl    = SITE_URL . DS . ADMIN_ALIAS;
        
        if($this->request->is('POST') && isset($formData)){
            $this->Home->set($formData);
            
            if($this->Home->validates()){
                $userInfo = $this->Home->userLogin($formData["txtUserEmail"]);
                
                if(count($userInfo["Home"]) > 0
                    && $userInfo["Home"]["user_password"] === md5($formData["txtUserPassword"])
                    && $userInfo["Home"]["user_status"] == 1
                ){
                    if($userInfo["Home"]["user_admin"] <= 0){
                        $redirectUrl = SITE_URL;
                    }
                    
                    $this->Session->write('UserSession',
                        array(
                            'userID'    => (int) $userInfo["Home"]["user_id"],
                            'userName'  => $userInfo["Home"]["user_name"],
                            'isAdmin'   => (int) $userInfo["Home"]["user_admin"],
                            'isLogin'   => TRUE
                        )
                    );
                    
                    $this->redirect($redirectUrl);
                }else{
                    $this->Session->setFlash('Email or password is invalid');
                }
            }else{
                $this->set('validationErrs', $this->Home->validationErrors);
            }
        }
        
        $this->set('title_for_layout', 'Login');
        
        $this->layout = NULL;
    }
    
    public function admin_logout(){
        $this->Session->delete('UserSession');
        $this->Session->setFlash('You have logged out');
        
        $this->redirect(SITE_URL . DS . 'login');
    }

}