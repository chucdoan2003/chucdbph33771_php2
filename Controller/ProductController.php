<?php 
    require_once('Model/ProductModel.php');
    require_once('Model/CategoryModel.php');
    
    class ProductController{
        public $data=[];
        function listProduct(){
            $product = new ProductModel();
            
            $this->data['products']=$product->getProduct();
            $this->data['view']='view/product/list.php';
            return $this->data;
            
        }
        
        function addProduct(){
            $category = new CategoryModel();
            $this->data['categories']=$category->getCategory();
            $this->data['view']='View/product/add.php';
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $cate_id = $_POST['cate_id'];
                $product = new ProductModel();
                $product->add($name, $price, $cate_id);
                return $this->data;

            }else{
                return $this->data;
            }
        }
        function editProduct(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $category = new CategoryModel();
                $product = new ProductModel();
                $this->data['categories']=$category->getCategory();
                $this->data['products']=$product->getOneProduct($id);
                $this->data['view']='View/product/edit.php';
            }
            
            if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['edit'])){
                $id =$_GET['id'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $cate_id = $_POST['cate_id'];
                $product = new ProductModel();
                $product->edit($id, $name, $price, $cate_id);
                header('location:index.php?url=list-product');
            }else{
                return $this->data;
            }
            
            
        }
        function deleteProduct(){
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $product = new ProductModel();
                $product->deletePr($id);      
                $this->data['view']='View/product/list.php';
                return $this->data;
            }
        }
    }
    