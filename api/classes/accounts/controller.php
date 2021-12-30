<?php

require "model.php";

class AccountController{
   
    public $model;

    public function __construct() {
        $this->model = new AccountModel;
    }
    public function getAllAccountId($user){
        $result = $this->model->getAllAccountId($user);
        
        if (empty($result)) {
            return 0;
        } else {
            $array = array();
            foreach ($result as $value) {
               $element = $value;
               array_push($array,$element);

               
            }

            return $array;

        }
    }
    
    public function get($userId,$accountId){
        # if we haven't the account id we get all acount id based in user id provided
        $result = $this->model->get($userId,$accountId);
        
        return $result;
      
       
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