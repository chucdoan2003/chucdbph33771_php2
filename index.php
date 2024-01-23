<?Php 
    require_once('Controller/ProductController.php');
    require_once('Controller/CategoryController.php');
    require_once('Controller/UserController.php');
    require_once('Controller/CartController.php');
    require_once('Controller/InvoiceController.php');
    $productController = new ProductController();
    $categoryController = new CategoryController();
    $userController = new UserController();
    $cartController = new CartController();
    $invoiceController = new InvoiceController();
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
           
        case 'list-cart':
            $view= $cartController->listSpCart();
            if(is_array($view)){extract($view);}
            break;
        case 'delete-cart':
            $cartController->deleteSpCart();
            break;
        //invoice
        case 'list-invoice':
            $view= $invoiceController->getInvoice();
            if(is_array($view)){extract($view);}
            break;
        case 'add-invoice':
            $view=$invoiceController->addInvoice();
            if(is_array($view)){extract($view);}
            break;
        case 'cancel-invoice':
            $invoiceController->changeInvoice(4);
            break;
        case 'datlai-invoice':
            $invoiceController->changeInvoice(0); 
            break;
             //user
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
    