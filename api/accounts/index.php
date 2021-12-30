<?php

    require "../classes/accounts/view.php";

    $_interface  = new Accounts();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        if (isset($_GET["user"])) {
            $user = $_GET["user"];

            if (isset($_GET["account"])) {
            
                $account = $_GET["account"];
                
                $_interface->get($user,$account);

            } else {
            
                $_interface->get($user);
            }
            
        } else {
            
            $_interface->responses->data_missing();

        }
        

    } else if($_SERVER["REQUEST_METHOD"] == "POST") {
        $data =  json_decode(file_get_contents("php://input"),false);

        $_interface->post($data);

    } else if($_SERVER["REQUEST_METHOD"] == "DELETE") {


            if (isset($_GET["account"])) {
            
                $json = $_GET["account"];
                
                $_interface->delete($json);

            } else {
            
                $_interface->responses->data_missing();
            }
            
       
        
        
    }else if($_SERVER["REQUEST_METHOD"] == "PUT") {
        
        $data =  json_decode(file_get_contents("php://input"),false);
            
        $_interface->put($data);

       
    }
?>
