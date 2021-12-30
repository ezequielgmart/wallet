<?php

require ("../classes/config/db.php");

class AccountModel extends Db{
   private $table = "accounts";
   private $second = "transactions";

   # To get all accounts id
    public function getAllAccountId($user){
        $query = $this->selectAllAccountIdByUser($user);
        return $result = parent::getId($query);
    }
  
    # to get all acount data
    public function get($user, $accountId){

        $query = $this->selectAccountById($user,$accountId);
        return $result = parent::getQuery($query);

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
        accountId = '$json'
        ";

    }
    # to get all account function
    private function selectAllAccountIdByUser($json){
        return $query = "SELECT accountId from $this->table WHERE userId='$json'";
    }

    # get all acount information 
    private function selectAccountById($user,$accountId){
            return $query = "SELECT 
            $this->table.accountId,
            $this->table.userId,
            $this->table.accountName,
            $this->table.categorie,
            $this->table.accountingCategorie,
            SUM(expenses) AS expenses,
            SUM(incomes) AS incomes,
            SUM(transferIn) AS transferIn,
            SUM(transferOut) AS transferOut
            from 
            $this->table,
            $this->second
            WHERE
            $this->table.userId = '$user' AND
            $this->table.accountId = '$accountId'
            AND
            $this->second.accountId = $this->table.accountId";
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