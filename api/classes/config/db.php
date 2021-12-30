
<?php
    
    class Db{
        
            private $db='';
            private $host='';
            private $user='';
            private $pass='';
            private $conn='';

    
             function __construct() {
                 $fileData = $this->getDbInfo();
               
                 foreach ($fileData as $key => $value) {
                    $this->db = $value["db"];
                    $this->host = $value["host"];
                    $this->user = $value["user"];
                    $this->pass = $value["password"];
    
                
                }
    
                $this->conn = new mysqli($this->host, $this->user,$this->pass, $this->db);
    
                
                if ($this->conn->connect_errno) {
                    echo "conection failed";
                    die();
                }
            }
    
            private function getDbInfo(){
                $dir = dirname(__FILE__);
                $file = file_get_contents($dir .'/config.json');
                return $data = json_decode($file, true);
    
    
            }
    
            public function nonQuery($query){
                $result = $this->conn->query($query);
                if ($this->conn->affected_rows != 1) {
                    return 0;
                } else {
                    return 1;
                }
                
            }
    
            public function nonQueryId($query){
                $result = $this->conn->query($query);
                $rows =  $this->conn->affected_rows;
                if ($rows != 0) {
                    return $rows;
                } else {
                    return 0;
                }
                
            }
    
            public function getQuery($query){
                $result = $this->conn->query($query);
                $array = array();
                foreach ($result as $key => $value) {
                    $element = array();

                    $element["accountId"] = $value["accountId"];
                    $element["userId"] = $value["userId"];
                    $element["accountName"] = $value["accountName"];
                    $element["categorie"] = $value["categorie"];
                    $element["accountingCategorie"] = $value["accountingCategorie"];
                    $element["expenses"] = $value["expenses"];
                    $element["incomes"] = $value["incomes"];
                    $element["transferIn"] = $value["transferIn"];
                    $element["transferOut"] = $value["transferOut"];
                    $element["balance"] = $this->getAccountBalance($value["incomes"],$value["transferIn"],$value["expenses"],$value["transferOut"]);

                    array_push($array, $element);
    
                }
                return $array;
            }
            private function getAccountBalance($incomes,$transferIn,$transferOut,$expenses){
                return ($incomes + $transferIn)-($transferOut + $expenses);

            }
            public function getData($query){
                $result = $this->conn->query($query);
                $array = array();
                foreach ($result as $key ) {
                    $array[] = $key;
    
                }
                return $array;
            }
    
            public function getId($query){
                $result = $this->conn->query($query);
                $array = array();
                foreach ($result as $key => $value){
                    $element = $value["accountId"];

                    array_push($array,$element);

                }

                return $array;
            }

            public function json($json){
                echo json_encode($json);
            }
           
          
        }


?>