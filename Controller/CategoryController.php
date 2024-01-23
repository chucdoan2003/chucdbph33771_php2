<?php
    require_once('Model/CategoryModel.php');
    require_once('Model/ProductModel.php');
    require_once('AbstractClass.php');

    class CategoryController{
        public $data=[];
        public function listCategory(){
            $category = new CategoryModel();
            $this->data['categories'] = $category->getCategory();
            $this->data['view']='View/category/list.php';
            return $this->data;
        } 
        public function addCategory(){
            $this->data['view']='View/category/add.php';
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them'])){
                $name = $_POST['name'];
                $decription = $_POST['decription'];
                $content = $_POST['content'];
                $category = new CategoryModel();
                $category->add($name, $decription, $content);
                header('location:?url=list-category');
            }else{
                return $this->data;
            }

        } 
        public function editCategory(){
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $category = new CategoryModel();
                $this->data['categories'] = $category->getOneCategory($id);
                $this->data['view']='View/category/edit.php';
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])){
                $name = $_POST['name'];
                $decription = $_POST['decription'];
                $content = $_POST['content'];
                $category = new CategoryModel();
                $category->edit($id, $name, $decription, $content);
                header('location:index.php?url=list-category');
            }else{
                return $this->data;
            }
        } 
        public function deleteCategory(){
            if(isset($_GET['id'])){
                $id= $_GET['id'];
                $category = new CategoryModel();
                $category->deleteCate($id);
                $product = new ProductModel();
                $product->deleteCate($id);
                header('location:index.php?url=list-category');
            }

        } 
    }