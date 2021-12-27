<?php

require "model.php";

class AccountController{
   
    public $model;

    public function __construct() {
        $this->model = new AccountModel;
    }
    public function get($userId,$accountId=""){
        if ($userId != "") {
            if ($accountId =="") {
                $result = $this->model->get($userId);
            
                if (empty($result)) {
                    return 0;
                } else {
                    return $result;
                }
    
            } else {
                $result = $this->model->get($accountId,$userId);
            
                if (empty($result)) {
                    return 0;
                } else {
                    return $result;
                }
    
            }
        } else {
            return 400;
        }
        
      
       
   }
   
    public function post($json){
        if (empty($json)) {

            return 400;

        } else {
            
            $result = $this->model->post($json);
        
            if ($result == 0) {
                return 0;
            } else {
                return 1;
            }

        }
        
    
    
    }
    
    public function delete($json){
        if (empty($json)) {

            return 400;

        } else {
            
           return $result = $this->model->delete($json);
        
            

        }
        
    
    
    }

    
    public function put($json){
        if (empty($json)) {

            return 400;

        } else {
            
            $result = $this->model->put($json);
        
            if ($result == 0) {
                return 0;
            } else {
                return 1;
            }

        }
        
    
    
    }
}

?>