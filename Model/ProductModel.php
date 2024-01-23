<?php 
    require_once('Database.php');

    class ProductModel extends Database{
        public function getProduct(){ 
            $sql = 'SELECT product.id, product.name, product.price, category.name as category_name FROM product JOIN category ON product.cate_id=category.id';
            return $this->getData($sql);
        }
        public function getOneProduct($id){
            $sql = "SELECT * FROM product WHERE id = $id";
            return $this->getData($sql, false);
        }
        public function add($name, $price, $cate_id){
            $sql = "INSERT INTO product(name, price, cate_id) VALUES('$name', $price, $cate_id)";
            $this->getData($sql, false);
        }
        public function edit($id, $name, $price, $cate_id){
            $sql = "UPDATE product set name = '$name', price = $price, cate_id =$cate_id where id = $id ";
            $this->getData($sql, false);
        }
        public function deletePr($id){
            $sql = "DELETE FROM product WHERE id = $id";
            $this->getData($sql, false);
        }
        public function deleteCate($id){
            $sql = "DELETE FROM product where cate_ID =$id";
            $this->getData($sql, false);
        }
    }
?>