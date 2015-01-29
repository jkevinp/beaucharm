<?php

class error extends Controller{
    function __construct() 
    {
        parent::__construct();
    }
    function index()
    {
        $this->view->render('wentwrong');
    }
    function error()
    {
          
        $this->view->render('wentwrong');
    }
    
}

