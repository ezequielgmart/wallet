<?php

require ("../classes/config/db.php");

class AuthModel extends Db{
   private $table = "users";

    public function get($json){
        
            $query = $this->select($json);
            return $result = parent::getData($query);
        

    }

    public function post($json){
        
        $query = $this->insert($json);
        $result = parent::nonQuery($query);
        if ($result != 0) {
            $json["email"];
        } else {
            # code...
        }
        
    }
    public function delete($json){
       
        $query = $this->del($json);
        return $result = parent::nonQuery($query);
    
    }

    public function put($json){

        $query = $this->update($json);
        return $result = parent::nonQuery($query);
    
    }

    private function del($json){

        return  $query = "DELETE FROM
        $this->table 
        WHERE 
        tokenId = '$json'
        ";

    }
    private function select($json){

            return $query = "SELECT 
            userId,
            email,
            password,
            name,
            lastName
            from 
            $this->table
            WHERE
            email = '$json'";
        
        
        
    }

    private function insert($json){

        return $query = "INSERT INTO
        $this->table 
        (
        tokenId,
        userId,
        dateCreation,
        status
        )
        VALUES
        (
        '$json->tokenId',
        '$json->userId',
        '$json->date',
        '1'
        )";

    }

    private function update($json){

        return $query ="UPDATE $this->table SET
        `status`='0'
         WHERE tokenId='$json'";

    }
    
}


?>