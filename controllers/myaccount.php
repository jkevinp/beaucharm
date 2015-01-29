<?php
class myaccount extends Controller 
{

    function __construct() 
    {
        parent::__construct();
    }
    public function myaccount()
    {
      	$this->loadModel('services');
        if(isset($_SESSION['user']['userid']))
        {
              $this->view->d = array('servicescategory'=> $this->model->get_services(),
                                'employees' => $this->model->get_employees(),
                                'appointments'=> $this->model->get_appointmentsws($_SESSION['user']['userid'],'On Queue'),
                                'oldappointments'=> $this->model->get_appointmentsws($_SESSION['user']['userid'],'Finished')
                               );
            }else{
                  $this->view->d = array('servicescategory'=> $this->model->get_services(),
                                'employees' => $this->model->get_employees(),
                                'appointments'=> $this->model->get_appointmentsws($_GET['customerid'],'On Queue'),
                                'oldappointments'=> $this->model->get_appointmentsws($_GET['customerid'],'Finished')
                               );
                  echo '<pre>Customer ID: <input id="ace_bakla" type="text" value="'.$_GET['customerid'].'" disabled/></pre>';
            }
    
    	  $this->view->render('myaccount');
    }

}
