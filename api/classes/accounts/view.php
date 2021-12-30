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

        public function get($user,$account =""){
            
                
            if ($account == "") {
                
                $accountId = $this->control->getAllAccountId($user); 

                $array  = array();
                foreach ($accountId as $key => $value) {
                    # code..
                    $result = $this->control->get($user,$value);
                    array_push($array,$result);


                }

                $this->json($array);
                // if (!empty($result)) {
                //     $this->json($result);
                // } else {
                //     $this->responses->get_no_content();
                // }
                
            } else {
                
                $result = $this->control->get($user,$account); 
                if (!empty($result)) {
                    $this->json($result);
                } else {
                    $this->responses->get_no_content();
                }
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