<?php

require ("../classes/config/db.php");

class AccountModel extends Db{
   private $table = "accounts";
   private $second = "typeaccounts";
   private $third = "users";

    public function get($userId,$accountId=""){
        
        if ($accountId == "") {
            $query = $this->select($user);
            return $result = parent::getData($query);
        } else {
            $query = $this->select($userId,$accountId);
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

    private function select($userId,$accountId=""){

        if ($transactionCategoryId == "") {
            return $query = "SELECT 
            userId,
            typeAccountId,
            account,
            currencyId,
            categoryId,
            note
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
        accountName,
        typeAccountId,
        note
        )
        VALUES
        (
        '$json->userId',
        '$json->account',
        '$json->typeAccountId',
        '$json->note'
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