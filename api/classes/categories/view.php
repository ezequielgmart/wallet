<?php
    require "controller.php";
    require ("../classes/config/responses.php");
    class Category{

        public $control;
        public $responses;

        public function __construct() {
           $this->control = new CategoryController;
           $this->responses = new Responses;
        }

        public function get($userId,$categoryId = ""){
            if ($categoryId != "") {
                $result = $this->control->get($categoryId,$userId);
                if ($result == 0) {
                    $this->responses->get_no_content();
                } else if ($result == 400){
                    $this->responses->data_missing();  
                } else {
                    $this->json($result);
                }

            
            } else {  
                $result = $this->control->get($userId);
                if ($result == 0) {
                    $this->responses->get_no_content();
                } else {
                    $this->json($result);
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