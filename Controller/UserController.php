<?php
require_once('Model/UserModel.php');
require_once('AbstractClass.php');

    class UserController extends User{
        public $model, $data;
        public function __construct(){
            $this->model= new UserModel();
        }
        public function login(){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $user=$this->model->getUser($username, $password);
                if(is_array($user) && $user!=''){
                    $_SESSION['user']=$user;
                    $this->data['tb']="Đăng nhập thành công";
                    $this->data['view']='View/user/login.php';
                }else{
                    $this->data['tb']='Tài khoản hoặc mật khẩu không chính xác';
                    $this->data['view']='View/user/login.php';

                }
                
               return $this->data;

            }else{
                $view='View/user/login.php';
               return $view;
            }
        }
        public function register(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $username=$_POST['username'];
                $password=$_POST['password'];
                $email=$_POST['email'];
                $this->model->insertUser($username, $password, $email);
                $tb= 'đăng ký thành công';
                $view='View/user/register.php';
                return $view;
            }else{
                
                $view='View/user/register.php';
                return $view; 

        }
    }
        public function forgotPass(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $email = $_POST['email'];
                $pass=$this->model->sendPass($email);
                if(is_array($pass) && $pass!=''){
                    $this->data['tb']='Mật khẩu của bạn là: '.$pass['password'];
                }else{
                    $this->data['tb']='Email không tồn tại';
                }
            }else{
                $this->data['tb']='';
            }
        }
        public function logout(){
            if(isset($_SESSION['user'])){
                unset($_SESSION['user']);
                return $view='View/user/login.php';
            }else{
                return $view='View/user/login.php';
            }
        }
    }