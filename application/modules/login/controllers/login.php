<?php

/* 
This document is own by Kennette J. Canales.

No portion of this document shall be use or copy  by anyone without the authorization of the owner.
That act stated above is against the law of IP or Intellectual Property.

This document is exclusive to the website (commcuriosity) develop by the following members of the team:

1. Kennette J. Canales
2. Joseph Carlo Ruiz 

@copyright 2016
@communicaction curiosity
@department of communications, linguistics and literature
*/


class Login extends API_Controller{
    
	public function loginPage(){
        $this->load->view('html/login_page');
		$this->load->model('M_Login');
    }
	public function loginSuccess(){
        $this->load->view('messages/login_success');
    }
	public function loginUsernameNotFoundError(){
        $this->load->view('messages/login_username_not_found');
    }
	public function loginDidnotMatchedError(){
        $this->load->view('messages/login_didnot_matched');
    }
	public function loginRequiredInformationError(){
        $this->load->view('messages/login_required_information');
    }
}

?>