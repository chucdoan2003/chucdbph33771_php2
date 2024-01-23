<?php
    require_once('Database.php');
    class CategoryModel extends Database{
        public function getCategory(){
            $sql = 'SELECT * FROM category';
            return $this->getData($sql);
        }
        public function getOneCategory($id){
            $sql = "SELECT * FROM category WHERE id = $id";
            return $this->getData($sql, false);
        }
        public function add($name, $decription, $content){
            $sql = "INSERT INTO category(name, decription, content) VALUES('$name', '$decription','$content')";
            $this->getData($sql, false);
        }
        public function edit($id, $name, $decription, $content){
            $sql = "UPDATE category set name = '$name', decription = '$decription',
             content = '$content' where id = $id ";
            $this->getData($sql, false);
        }
        public function deleteCate($id){
            $sql = "DELETE FROM category WHERE id = $id";
            $this->getData($sql, false);
        }

        
    }



?>