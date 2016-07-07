<?php

/* Created by John Enrick Pleños */
class FE_Controller extends API_Controller{
    public function __construct() {
        parent::__construct();
        //sleep(5);
    }
    /***
     * Load a page which includes the system module
     */
    public function loadPage($module, $data = array()){
        $data["default"] = array(
            "module" => $module
        );
        $this->load->view("system_application/system_frame");
        $this->load->view("system_application/system", $data);
        $this->load->view("system_application/system_script");
        $this->load->view("system_application/system_frame_script");
        $this->load->view("system_application/system_utilities_script");
    }
    /***
     * Load a module request from already loaded page
     */
    public function loadModule($moduleView, $moduleScript){
        if(is_array($moduleView)){
            foreach($moduleView as $view){
                $this->load->view($view);
            }
        }else{
            $this->load->view($moduleView);
        }
        if(is_array($moduleScript)){
            foreach($moduleScript as $script){
                $this->load->view($script);
            }
        }else{
            $this->load->view($moduleScript);
        }
    }
    public function generateResponse($data = false, $error = array()){
        return array(
            "data" => $data,
            "error" => $error
        );
    }
}

