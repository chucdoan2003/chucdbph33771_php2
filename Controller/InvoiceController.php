<?php
require_once('AbstractClass.php');
require_once('Model/InvoiceModel.php');

class InvoiceController extends Invoice{
    public $data=[],$model;
    public function __construct(){
        $this->model= new InvoiceModel();
    }
    public function addInvoice(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_GET['id'])){
                $id_cart=$_GET['id'];
            } 
            if(isset($_SESSION['user'])){
                $id_user=$_SESSION['user']['id'];
            }
            $id_invoice =$this->model->insertInvoice($id_user, $id_cart);
            $id_sp =$_POST['id_sp'];
            $quantity =$_POST['quantity'];
            $total =$_POST['total'];
            $this->model->insertDetailInvoice($id_invoice, $id_sp, $quantity, $total);
        }
        $this->data['view']='View/home/home.php';

        return $this->data;
    }
    public function getInvoice(){
        if(isset($_SESSION['user'])){
            $id_user=$_SESSION['user']['id'];
        }
        $this->data['invoices']=$this->model->getInvoice($id_user);
        $this->data['view']='View/invoice/list.php';
        return $this->data;
    }
    public function changeInvoice($change){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        $this->model->changeInvoice($change, $id);
        header('location:?url=list-invoice');
    }


}