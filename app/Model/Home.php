<?php
class Home extends AppModel {
    public $useTable = "users";
    public $validate = array(
        'txtUserEmail'      => array(
            'empty'         => array(
                'rule'      => 'notEmpty',
                'message'   => 'Email not be blank'
            ),
            'validEmail'    => array(
                'rule'      => 'email',
                'message'   => 'Email is invalid'
            )
        ),
        'txtUserPassword'   => array(
            'empty'         => array(
                'rule'      => 'notEmpty',
                'message'   => 'Password not be blank'
            )
        )
    );
    
    /**
     * User login
     * 
     * @param string $email Email address
     * @return mixed User information match email address
     */
    public function userLogin($email){
        return $this->find('first',
            array(
                'conditions' => array(
                    'user_email' => $email
                )
            )
        );
    }
}