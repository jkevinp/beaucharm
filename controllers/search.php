<?php
class search extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }
    function index()
    {
        echo "index";
    }
    function search()
    {
        $this->loadModel('services');
        
        $this->view->d = array('description' => $this->model->get_service_descriptionByName($_GET['q']),
            'name' => $this->model->get_service_search($_GET['q']));
        $this->view->render('search');
    }
}

