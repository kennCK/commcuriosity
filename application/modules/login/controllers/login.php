<?php

class Login extends API_Controller{
    
	public function login_page(){
        $this->load->view('login_page');
    }
}

?>