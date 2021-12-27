<?php
 require "../classes/users/view.php";

 $_interface  = new Auth();

 if ($_SERVER["REQUEST_METHOD"] == "GET") {

     if (isset($_GET["user"])) {
            $user = $_GET["user"];
        
            $_interface->get($user);
         
     } else {
         
         $_interface->responses->data_missing();

     }
     

 } else if($_SERVER["REQUEST_METHOD"] == "POST") {
     $data =  json_decode(file_get_contents("php://input"),false);

     $_interface->login($data);

 } else if($_SERVER["REQUEST_METHOD"] == "DELETE") {


         if (isset($_GET["category"])) {
         
             $category = $_GET["category"];
             
             $_interface->delete($category);

         } else {
         
             $_interface->responses->data_missing();
         }
         
    
     
     
 }else if($_SERVER["REQUEST_METHOD"] == "PUT") {
     
     $data =  json_decode(file_get_contents("php://input"),false);
         
     $_interface->put($data);

    
 }
?>