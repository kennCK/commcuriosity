<?php

class Login extends API_Controller{
    
	public function loginPage(){
        $this->load->view('login_page');
    }
	public function loginSuccess(){
        $this->load->view('login_success');
    }
	public function loginUsernameNotFound(){
        $this->load->view('login_username_not_found');
    }
	public function loginDidnotMatched(){
        $this->load->view('login_didnot_matched');
    }
}

?>