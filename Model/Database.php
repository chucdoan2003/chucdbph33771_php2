<?php 
    require_once('env.php');
    class Database{
        public function getConnect(){
            $connect = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.
            ';charset='.DBCHARSET, DBUSER, DBPASS);
            
            return $connect;
        }
        public function getData($querry, $getAll = true){
            $conn =$this->getConnect();
            $stmt = $conn->prepare($querry);
            $stmt->execute();
            if($getAll){
                return $stmt->fetchAll();
            }else {
                return $stmt->fetch();
            }
        }
    }
    

?>