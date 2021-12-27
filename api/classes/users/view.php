<?php
    require "controller.php";
    require ("../classes/config/responses.php");
    class Auth{

        public $control;
        public $responses;

        public function __construct() {
           $this->control = new AuthController;
           $this->responses = new Responses;
        }

        public function get($json){
                
            $result = $this->control->get($json);
            if ($result == 0) {
                $this->responses->get_no_content();
            } else if ($result == 400){
                $this->responses->data_missing();  
            } else {
                $this->json($result);
            }

            
            
           
            
        }

        public function login($json){
            $result = $this->control->login($json);
            if (empty($result)) {
                $this->responses->server_error();
            } else {
                $this->json($result);
            }
 
 
         }
        


        public function json($json){
            echo json_encode($json);
        }
    }

?>