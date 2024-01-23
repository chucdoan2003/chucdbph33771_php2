<?php 
abstract class Product{
    abstract function listProduct();
    abstract function addProduct();
    abstract function editProduct();
    abstract function deleteProduct();
}
abstract class Category{
    abstract function listCategory();
    abstract function addCategory();
    abstract function editCategory();
    abstract function deleteCategory();

}
abstract class Cart{
    abstract function addCart();
    abstract function listSpCart();
    abstract function deleteSpCart();

}
abstract class User{
    abstract function login();
    abstract function register();
    abstract function forgotPass();
    abstract function logout();

}
abstract class Invoice{
    abstract function addInvoice();
    
}