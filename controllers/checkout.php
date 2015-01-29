<?php
class checkout extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }
    function index()
    {
        echo "index";
    }
    function checkout()
    {
        $this->loadModel('services');
        if(isset($_GET['cid']) && isset($_GET['bid']))
        {
            $this->view->d =  array(
                                    'info' =>
                                     $this->model->checkout
                                        (
                                            base64_decode($_GET['cid']) , base64_decode($_GET['bid'])
                                        ));
            
            $this->view->render('checkout');
        }
        else echo "Access Denied!";
      
    }
}

