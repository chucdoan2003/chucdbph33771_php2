<?php 
    require_once('Database.php');

class CartModel extends Database{
    protected $table='carts';
    public function getAllCart(){
        $sql = "select * from $this->table";
        return $this->getData($sql, true);
    }    
    public function getSpCart($id_user){
        $sql="SELECT carts_detail.id,carts_detail.id_cart, users.username, product.name,product.id AS id_sp,
         carts_detail.quantity, carts_detail.total
        FROM carts_detail JOIN product ON carts_detail.id_sp=product.id
        JOIN carts ON carts_detail.id_cart = carts.id 
        JOIN users ON carts.id_user =users.id where users.id=$id_user";
        return $this->getData($sql, true);
    }
    public function getCart($id){
        $sql = "select * from $this->table where id =$id";
        return $this->getData($sql, false);
    }
    public function checkUserCart($id){
        $sql = "select * from $this->table where id_user =$id";
        return $this->getData($sql, false);
    }
    public function checkSpCart($id_sp,$id_cart){
        $sql="SELECT * FROM carts_detail WHERE id_sp =$id_sp AND id_cart =$id_cart";
        return $this->getData($sql, false);
    }
    function insert_user_cart($id_user){
        $conn=$this->getConnect();
        $sql="insert into carts(id_user) values(?)";
       $stmt = $conn->prepare($sql);
       $stmt->execute([$id_user]);
       $lastID=$conn->lastInsertId();
       return $lastID;
    }
    public function deleteCart($id){
        $sql = "DELETE from carts_detail where id=$id";
        $this->getData($sql, false);
    }
    public function insert_detail_cart($id_cart, $id_sp, $quantity, $total){
        $sql="INSERT INTO carts_detail(id_cart,id_sp, quantity, total) VALUES($id_cart, $id_sp, $quantity, $total)";
        $this->getData($sql, false);

    }
    public function updateQuantity($quantity,$total, $id){
        $sql="UPDATE carts_detail SET quantity=$quantity, total=$total WHERE id =$id";
        $this->getData($sql, false);
    }
}