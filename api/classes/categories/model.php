<?php

require ("../classes/config/db.php");

class CategoryModel extends Db{
   private $table = "transactioncategory";

    public function get($userId,$transactionCategoryId=""){
        
        if ($transactionCategoryId == "") {
            $query = $this->select($userId);
            return $result = parent::getData($query);
        } else {
            $query = $this->select($userId,$transactionCategoryId);
            return $result = parent::getData($query);
        }

    }

    public function post($json){
        
        $query = $this->insert($json);
        return $result = parent::nonQuery($query);

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
        transactionCategoryId = '$json'
        ";

    }

    private function select($userId,$transactionCategoryId=""){

        if ($transactionCategoryId == "") {
            return $query = "SELECT 
            transactionCategoryId,
            userId,
            transactionCategory,
            categoryTypeId
            from 
            $this->table
            WHERE
            userId = '$userId'";
        } else {
            return $query = "SELECT 
            transactionCategoryId,
            userId,
            transactionCategory,
            categoryTypeId
            from 
            $this->table
            WHERE
            userId = '$userId' 
            AND
            transactionCategoryId='$transactionCategoryId'
            ";
        }
        
        
    }

    private function insert($json){

        return $query = "INSERT INTO
        $this->table 
        (
        userId,
        transactionCategory,
        categoryTypeId
        )
        VALUES
        (
        '$json->userId',
        '$json->transactionCategory',
        '$json->categoryType'
        )";

    }

    private function update($json){

        return $query ="UPDATE $this->table SET
        `userId`='$json->userId',
        `transactionCategory`='$json->transactionCategory',
        `categoryTypeId`='$json->categoryType'
         WHERE transactionCategoryId='$json->transactionCategoryId'";

    }
    
}


?>