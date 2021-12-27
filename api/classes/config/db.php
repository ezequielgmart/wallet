
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
    
            
            public function getData($query){
                $result = $this->conn->query($query);
                $array = array();
                foreach ($result as $key ) {
                    $array[] = $key;
    
                }
                return $array;
            }
    

            public function json($json){
                echo json_encode($json);
            }
           
          
        }


?>