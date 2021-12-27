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

        public function get($tokenId){
        $result = $this->control->get($tokenId); 
            
        }

        public function post($json){
            $result = $this->control->post($json);
           echo $result;


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