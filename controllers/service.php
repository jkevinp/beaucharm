<?php
class service extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }
    function index()
    {
        echo "index";
    }
    function service()
    {
        $this->loadModel('services');
        $this->view->d = array(
                            'description' => $this->model->get_service_description($_GET['name']),
                            'service' => $this->model->get_service_name($_GET['name'])
                            );
       $this->view->render('service');
    }
}

