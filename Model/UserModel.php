<?php

    class UserModel extends Database{
        protected $table='users';
        public function getAllUser(){
            $sql = 'select * from $this->table';
            return $this->getData($sql, true);
        }    
        public function getUser($userName, $passWord){
            $sql = "select * from $this->table where username='$userName' and password='$passWord'";
            return $this->getData($sql, false);
        }
        public function updateUser($id, $userName, $passWord, $email, $fullname, $gender, $tel, $avt){
            $sql = "UPDATE $this->table SET username = '$userName', password='$passWord',
            email = '$email', fullname = '$fullname', gender = '$gender', tel = '$tel', avt = '$avt'
            WHERE id = $id";
            $this->getData($sql, false);
        }
        public function insertUser($userName, $passWord, $email){
            $sql = "INSERT INTO $this->table(username, password, email) VALUES('$userName', '$passWord', '$email')";
            $this->getData($sql, false);
        }
        public function deleteUser($userName, $passWord){
            $sql = 'select * from $this->table where username='.$userName.' and password='.$passWord;
            $this->getData($sql, false);
        }
        public function updatePass($id, $passWord){
            $sql ="UPDATE $this->table SET password='$passWord' where id = $id";
            $this->getData($sql, false);
        }
        public function sendPass($email){
            $sql="SELECT password, email FROM $this->table where email = '$email'";
            return $this->getData($sql, false);
        }
    }