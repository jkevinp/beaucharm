<?php
class wentwrong extends Controller 
{
    function __construct() 
    {
        parent::__construct();
    }
    public function wentwrong()
    {
        $this->view->render('wentwrong');
    }
}
