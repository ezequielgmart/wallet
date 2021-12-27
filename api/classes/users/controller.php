<?php

require "model.php";

class AuthController{
   
    public $model;

    public function __construct() {
        $this->model = new AuthModel;
    }
    public function get($json){
       

            $result = $this->model->get($json);
        
            if (empty($result)) {
                return 0;
            } else {
                return $result;
            }
    
       
        
      
       
   }
   
  
    public function login($json){
        $data = array();

        $data["email"] = $json->email;
        $data["password"] = $json->password;
       
        $result =  $this->get($data["email"]);
        

        if (!empty($result)) {
            $serverPassword = $result[0]["password"];
            if (password_verify($data["password"],$serverPassword)) {
                return $result;
            } else {
                return 0;
            }
            

        } else {
            return 0;

        }
        
      
        
    
    
    }
   

    
}

?>