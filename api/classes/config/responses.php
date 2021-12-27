<?php

class Responses{
    /** GENERIC RESPONSES */
    public function ok($json =""){
        $this->code_200($json);
    }
    public function get_no_content(){
        $this->code_200("No results");
    }

    public function data_missing(){
        $this->code_400();
    }

    public function created(){
        $this->code_201();
    }

    
    public function server_error(){
        $this->code_500("The server cannot proccess this request. Please try again.");
    }
    //***** */
    private function code_200($msg){
        $this->define(200,$msg);
    }
    private function code_201($msg = ""){
        $this->define(201,$msg);
    }
    private function code_400($msg =""){
        $this->define(400,$msg);
    }
    private function code_500($msg =""){
        $this->define(500,$msg);
    }
    private function define($code,$msg=""){
        if ($msg=="") {
            http_response_code($code);
        } else {
            http_response_code($code);
            echo json_encode($msg);
        }
        

    }
}

?>