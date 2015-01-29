<?php

class epanel extends Controller
{
    function __construct() 
    {
        parent::__construct();
    }
    function epanel()
    {
        if(isset($_SESSION['admin']))echo '<script> document.location="'.URL.'cpanel/dashboard/"</script>';
        $this->view->render('cpanel', 'admin');
    }
    function dashboard($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $this->view->d = array(
                'count' => $this->model->admin_count_most_availed_service(),
                'least' =>$this->model->admin_count_least_availed_service(),
                'availed' =>$this->model->admin_count_services_availed(),
                'profit' => $this->model->admin_count_services_profit(),
                'cancelled' =>$this->model->admin_count_services_availed_by_status('Cancelled'),
                'onqueue' =>$this->model->admin_count_services_availed_by_status('On Queue'),
                'ontransaction' =>$this->model->admin_count_services_availed_by_status('On Transaction')
                );
        $this->view->render('dashboard', 'admin',true);
    }
    function customer_view($q)
    {
        if(!isset($_SESSION['admin']) || !isset($q['customerid'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $this->view->d = array('customer' => $this->model->get_customer($q['customerid']),
                                'appointments' => $this->model->get_appointments_cview($q['customerid'])
            );
        $this->view->render('customer_view', 'admin',true);
    }
    function employee_view($q)
    {
        if(!isset($_SESSION['admin']) || !isset($q['employeeid'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $this->view->d = array('emp' => $this->model->get_employee($q['employeeid'])
                             );
        $this->view->render('employee_view', 'admin',true);
    }
    function service_edit($q)
    {
        if(!isset($_SESSION['admin']) || !isset($q['serviceid'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $this->view->d = array('service' => $this->model->service_get_service_names($q['serviceid']),
                                'prices' => $this->model->get_service_price(),
                                'categories'=> $this->model->get_services()
                             );
        $this->view->render('edit_services', 'admin',true);
    }
    function appointments($q)
    {
        $this->loadModel('services');
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $page =0;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['status']))echo $q['status'];
        if(isset($q['search']))
        {
            $this->view->d = array(
            'appointments' => $this->model->admin_search_all_appointments($q['search'],$page),
            'count' =>  $this->model->admin_count_all_appointments($q['search'])
             );
        }
        else 
            $this->view->d = array
            (
                'appointments' => $this->model->admin_get_all_appointments_withdate(date("Y-m-d"))
            ,'count' =>  $this->model->admin_count_all_appointments(date("Y-m-d"))
            );
        $this->view->render('appointments', 'admin',true);
    }

    function edit_appointment($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        if(isset($q['appointmentid']) && isset($q['status']))
        {   
            $s = "";
            if($q['status'] === '1' || $q['status'] === 1)
            {
                $s = "On Queue";
            }
            else if($q['status'] === '2' || $q['status'] === 2)
            {
                $s ="On Transaction";
            }
            else if($q['status'] === '3' || $q['status'] === 3)
            {
                $s ="Finished";
            }   
            else
            {
                $s= "Cancelled";   
            }

                $this->model->appointment_edit_status($q['appointmentid'], $s);
                echo '<script> document.location="'.URL.'cpanel/appointments/"</script>';
        }
        else die('Something Went Wrong during the request.');
    }
    function customers($q)
    {
      
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $page =0;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['search']))
        {
            $this->view->d = array(
            'customers' => $this->model->admin_get_all_customers($q['search'],$page),
            'count' =>  $this->model->admin_count_all_customers($q['search'])
                                   );
        }
        else 
        $this->view->d = array(
        'customers' => $this->model->admin_get_all_customers(false,$page),
        'count' =>  $this->model->admin_count_all_customers()
                            );
        $this->view->render('customers', 'admin',true);
    }

    function services($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $page = 0;
        $search = false;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['search']))$search = $q['search'];
        $this->view->d = array('services' => $this->model->admin_get_services($search,$page),
                                'count' => $this->model->admin_count_services($search),
                                'categories' => $this->model->get_services(),
                                'prices' =>$this->model->get_service_price()
                                );
        $this->view->render('services', 'admin',true);
    }
     function service_edit_status($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');

        if(isset($q['serviceid']) && isset($q['status']))
        {
                $this->model->service_edit_status($q['serviceid'], $q['status']);
                echo '<script> document.location="'.URL.'cpanel/services/"</script>';
        }
        else die('Something Went Wrong during the request.');
    }

    function employees($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $page = 0;
        $search = false;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['search']))$search = $q['search'];
        $this->view->d= array(
                                'employees' => $this->model->admin_get_employees($search,$page),
                                'count' => $this->model->admin_count_employees($search),
                                'categories' => $this->model->get_services()
                            );
        $this->view->render('employees', 'admin',true);
    }
    function employee_edit_status($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        if(isset($q['employeeid']) && isset($q['status']))
        {
                $this->model->employee_edit_status($q['employeeid'], $q['status']);
                echo '<script> document.location="'.URL.'cpanel/employees/"</script>';
        }
        else die('Something Went Wrong during the request.');
    }

    //PROMOS
    function promos($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $page = 0;
        $search = false;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['search']))$search = $q['search'];
        $this->view->d = array('promos' => $this->model->admin_get_promo($search,$page),
                                'count'=>$this->model->admin_get_promo_count($search),
                                'services' =>$this->model->promo_get_service_names()
                                );
        $this->view->render('promos', 'admin',true);
    }
     function promo_edit_status($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');

        if(isset($q['promoid']) && isset($q['status']))
        {
                $this->model->promo_edit_status($q['promoid'], $q['status']);
                echo '<script> document.location="'.URL.'cpanel/promos/"</script>';
        }
        else die('Something Went Wrong during the request.');
    }
    //END PROMOS



    //HELP AND SUPPORT
    function help($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
        $this->loadModel('services');
        $page = 0;
        $search = false;
        if(isset($q['page']))$page = $q['page'];
        if(isset($q['search']))$search = $q['search'];
        $this->view->d = array
                            (
                                'messages' => $this->model->admin_get_messages($search,$page),
                                'count' => $this->model->admin_get_count_messages($search)
                            );
        $this->view->render('help', 'admin',true);
    }
    function message_delete($q)
    {
        if(!isset($_SESSION['admin'])) die('ACCESS DENIED');
      
        if(!isset($q['messageid'])) die('ERROR OCCURED');
        $this->loadModel('services');
        $this->view->d = array('message' => $this->model->admin_get_message_id($q['messageid']));
        $this->model->admin_delete_message($q['messageid']);
        $this->view->render('message_delete', 'admin',true);
    }
    //END HELP AND SUPPORT


}

