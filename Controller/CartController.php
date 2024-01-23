<?php
require_once('Model/CartModel.php');
require_once('Model/ProductModel.php');

class CartController{
    public $data=[], $productModel, $cartModel;
    public function __construct(){
        $this->productModel= new ProductModel();
        $this->cartModel= new CartModel();
    }
    
    public function addCart(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_GET['id'])){
                $id_sp=$_GET['id'];
            }
            if(isset($_SESSION['user']['id'])){
                $id_user=$_SESSION['user']['id'];
            }
            $quantity=$_POST['quantity'];
            $total=$quantity*$_POST['price'];
            //kiểm tra user có giỏ hàng chưa
            $checkUser= $this->cartModel->checkUserCart($id_user);
            //trường hợp user có giỏ hàng 
            if(is_array($checkUser) && $checkUser!=''){
                //trường hợp user có sản phẩm hay không trong giỏ hàng
                $id_cart=$checkUser['id'];
                $checkSP=$this->cartModel->checkSpCart($id_sp, $id_cart);
                //trường hợp có sản phẩm
                if(is_array($checkSP) && $checkSP!=''){
                    $newQuantity =$quantity + $checkSP['quantity'];
                    $newtotal=$_POST['price']*$newQuantity;
                    $this->cartModel->updateQuantity($newQuantity, $newtotal, $checkSP['id']);
                }else{
                    //trường hợp không có sản phẩm
                    $this->cartModel->insert_detail_cart($id_cart, $id_sp, $quantity, $total);

                }
            }else{
            //trường hợp không có user trong giỏ hàng
               $id_cart= $this->cartModel->insert_user_cart($id_user);
               $this->cartModel->insert_detail_cart($id_cart, $id_sp, $quantity, $total);
            }
            header('location:?url=list-cart');

        }
    }
    public function listSpCart(){
        $id_user =$_SESSION['user']['id'];
        $this->data['listCarts']=$this->cartModel->getSpCart($id_user);
        $this->data['view']='View/Cart/list.php';
        return $this->data;
    }
    public function deleteSpCart(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $this->cartModel->deleteCart($id);
            header('location:?url=list-cart');
        }
    }
}