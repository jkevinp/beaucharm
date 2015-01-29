<?php
class utility extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }
    function index()
    {
        echo "index";
    }
    function utility()
    {
        $this->view->render('directions');
    }
}

