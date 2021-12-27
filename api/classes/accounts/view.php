<?php
    require "controller.php";
    require ("../classes/config/responses.php");
    class Accounts{

        public $control;
        public $responses;

        public function __construct() {
           $this->control = new AccountController;
           $this->responses = new Responses;
        }

        public function get($user,$accountId){
            if ($accountId == "") {
                
                $result = $this->control->get($user); 

            } else {
                
                $result = $this->control->get($user,$accountId); 
            }
            
        }

        public function post($json){
            $result = $this->control->post($json);

            if ($result > 0) {
                $this->responses->created();
            } else {
                $this->responses->server_error();

            }

        }

        public function put($json){
            $result = $this->control->put($json);
            if ($result > 0) {
                $this->responses->created();
            } else {
                $this->responses->server_error();

            }


        }

        public function delete($json){
            $result = $this->control->delete($json);
            if ($result > 0) {
                $this->responses->created();
            } else {
                $this->responses->server_error();

            }


        }

        public function json($json){
            echo json_encode($json);
        }
    }

?>