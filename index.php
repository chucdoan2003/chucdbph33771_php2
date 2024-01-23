<?Php 
    require_once('Controller/ProductController.php');
    require_once('Controller/CategoryController.php');
    require_once('Controller/UserController.php');
    require_once('Controller/CartController.php');
    $productController = new ProductController();
    $categoryController = new CategoryController();
    $userController = new UserController();
    $cartController = new CartController();
    session_start();

    $url = $_GET['url'] ?? '/';
    switch ($url) {
        case '/':
            $view='View/Home/home.php';
            //call view list Product;
            break;
        case 'list-product': 
            $view=$productController->listProduct();
            if(is_array($view)){extract($view);}
            break;
        case 'add-product': 
            $view= $productController->addProduct();
            if(is_array($view)){extract($view);}
            break;
        case 'edit-product':
            $view = $productController->editProduct();
            if(is_array($view)){extract($view);}
            break;
        case 'delete-product':
            $view= $productController->deleteProduct();
            if(is_array($view)){extract($view);}
            break;
        case 'list-category':
            $view = $categoryController->listCategory();
            if(is_array($view)){extract($view);}

            break;
        case 'add-category':
            $view =$categoryController->addCategory();
            if(is_array($view)){extract($view);}

            break;
        case 'edit-category':
            $view =$categoryController->editCategory();
            if(is_array($view)){extract($view);}

            break;
        case 'delete-category':
            $categoryController->deleteCategory();
            break;
        case 'add-cart':
            $cartController->addCart();
            break;
            //user
        case 'list-cart':
            $view= $cartController->listSpCart();
            if(is_array($view)){extract($view);}
            break;
        case 'delete-cart':
            $cartController->deleteSpCart();
            break;
        case 'login':
            $login=true;
            $view=$userController->login();
            if(is_array($view)){extract($view);}
            break;
        case 'register':
            $login=true;
            $view= $userController->register();
            break;
        case 'logout':
            $login= true;
            $view=$userController->logout();
            break;
        default:

            # code...
            $view='View/home.php';
            break;
    }
    if(!isset($login)){
        require_once('View/header.php');
        require_once($view);

        require_once('View/footer.php');
    }else{

        require_once($view);
    }
    