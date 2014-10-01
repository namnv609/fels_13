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

}