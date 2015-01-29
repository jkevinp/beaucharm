<?php

class logout extends Controller{
    function __construct() 
    {
        parent::__construct();
    }
    function logout()
    {
          Session::init();
          $user = Session::get(SESSION_INFO);
          if(!empty($user))
          {
              echo $user;
            $this->redirect("dashboard");
          }
          else
          {
              $this->view->render('logout');
          }
    }
}

