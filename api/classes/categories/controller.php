<?php

require "model.php";

class CategoryController{
   
    public $model;

    public function __construct() {
        $this->model = new CategoryModel;
    }
    public function get($userId,$transactionCategoryId=""){
        if ($userId != "") {
            if ($transactionCategoryId =="") {
                $result = $this->model->get($userId);
            
                if (empty($result)) {
                    return 0;
                } else {
                    return $result;
                }
    
            } else {
                $result = $this->model->get($transactionCategoryId,$userId);
            
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