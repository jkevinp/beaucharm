<?php

class services_Model extends Model
{
	
	public function __construct() 
    {
    	parent::__construct();
    }
    function myaccount_get_employees()
    {
        return $this->executeSql("select * from `employee` where Status = 1",null);
    }
    function admin_custom_query($sql)
    {
        return $this->executeSql($sql,null);
    }
    function admin_revision_select($date)
    {
          return $this->executeSql
          (
            "SELECT 
                count(*)
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.AppointmentDate = '$date' and
                booking.CustomerID = customer.CustomerID

            ",null);
    }
    //BEGIN DASHBOARD
    function admin_count_most_availed_service()
    {
        $sql ="
        SELECT 
            booking.ServiceID,
            service.ServiceName
        FROM 
            `booking`,
            `service`
        where 
            booking.ServiceID = service.ServiceID 
        ";
        $ids = $this->executeSql($sql,null);
        $counted =  array_count_values(
                        array_map(
                        function($value)
                        {
                            return $value['ServiceName'];
                        }, 
                    $ids));
      
        $limit = 5;
        $counter = 0;
        $services = array();
        foreach ($counted as $k => $v) 
        {
            if($counter < $limit)
            {
                array_push($services, array('name' => $k,
                                            'size' => $v
                                        ));
                $counter ++;
            }  
        }


        return $services;
    }
    function admin_count_services_availed()
    {
        $date = date('Y-m-d');
        $dateMinusMonth =date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
        return $this->executeSql("
            SELECT 
                count(*),
                booking.servicePriceID
            FROM 
                booking where AppointmentDate >= '$dateMinusMonth' and 
                AppointmentDate <= '$date' and 
                Status = 'Finished'

            " ,null);
    }
     function admin_count_services_profit()
    {
        $date = date('Y-m-d');
        $dateMinusMonth =date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
        return $this->executeSql("
            SELECT 
               booking.servicePriceID,
               serviceprice.ServiceFee
            FROM 
                booking,
                serviceprice
            WHERE 
                AppointmentDate >= '$dateMinusMonth' and 
                AppointmentDate <= '$date' and 
                Status = 'Finished' and
                serviceprice.servicePriceID = serviceprice.servicePriceID

            " ,null);
    }
    function admin_count_services_availed_by_status($param)
    {
        $date = date('Y-m-d');
        $dateMinusMonth =date('Y-m-d', strtotime(date('Y-m-d')." -1 month"));
        return $this->executeSql("
            SELECT 
               count(*)
            FROM 
                booking
            WHERE 
                AppointmentDate >= '$dateMinusMonth' and 
                AppointmentDate <= '$date' and 
                Status = '$param'
            " ,null);
    }
     function admin_count_least_availed_service()
    {
        $sql ="
        SELECT 
            booking.ServiceID,
            service.ServiceName
        FROM 
            `booking`,
            `service`
        where 
            service.ServiceID =booking.ServiceID 
        ";
        $ids = $this->executeSql($sql,null);
        $counted =  array_count_values(
                        array_map(
                        function($value)
                        {
                            return $value['ServiceName'];
                        }, 
                    $ids));
      
        $limit = 5;
        $counter = 0;
        $counted = array_reverse($counted);
        $services = array();
        foreach ($counted as $k => $v) 
        {
            if($counter < $limit)
            {
                array_push($services, array('name' => $k,
                                            'size' => $v
                                        ));
                $counter ++;
            }  
        }


        return $services;
    }
    //END DASHBOARD

    //CUSTOMERS
    function admin_get_all_customers($param = false, $start = false)
    {
        $limit =RESULT_LIMIT;
        if(!$param)
        {
            if(!$start)
            return $this->executeSql("SELECT * FROM `customer` LIMIT $limit",null);
            else
            {
                $start = $start * $limit;
                return $this->executeSql("SELECT * FROM `customer` LIMIT $start,$limit",null);
            }
        }
        else
        {
           
           if(!$start)
           {
                return $this->executeSql
                (
                "SELECT 
                    *
                FROM 
                    `customer`
                Where 
                    CustomerID LIKE '%$param' OR 
                    FirstName Like '%$param' OR
                    LastName Like '%$param' OR
                    EmailAddress Like '%param%'
                    LIMIT 0,$limit
                ",null);
           }
           else{
                 $start = $start * $limit;
                 return $this->executeSql
                (
                "SELECT 
                    *
                FROM 
                    `customer`
                Where 
                    CustomerID LIKE '%$param' OR 
                    FirstName Like '%$param' OR
                    LastName Like '%$param' OR
                    EmailAddress Like '%param%'
                    LIMIT $start,$limit
                ",null);
           }
        }
        
    }
    function admin_count_all_customers($param = false)
    {
        if(!$param)
        {
             return $this->executeSql("SELECT count(*) FROM  `customer` ",null);
        }
        else
        {
            return $this->executeSql
            ("SELECT count(*) FROM `customer`Where 
                CustomerID LIKE '%$param' OR 
                FirstName Like '%$param' OR
                LastName Like '%$param'",null);
        }
       
    }
    //END CUSTOMERS


    //APPOINTMENTS
    public function admin_count_all_appointments_withdate($date)
    {
          return $this->executeSql
          (
            "SELECT 
                count(*)
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.AppointmentDate = '$date' and
                booking.CustomerID = customer.CustomerID

            ",null);
   
    }
    public function admin_count_all_appointments($query)
    {
          return $this->executeSql
          (
            "SELECT 
                count(*)
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                (
                    customer.FirstName LIKE '%$query%' OR
                    booking.AppointmentDate LIKE '%$query%' OR
                    customer.LastName Like '%$query%' OR
                    employee.FirstName Like '%$query%' OR
                    employee.LastName LIKE '%$query%' OR
                    customer.CustomerID = '$query' OR
                    employee.EmployeeID = '$query' OR
                    booking.BookingID = '%$query%' OR 
                    booking.Status = '$query'

                )
                and
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.CustomerID = customer.CustomerID
                
            ",null);
    }


    public function admin_get_all_appointments_withdate($date ,$start = false)
    {
          return $this->executeSql
          (
            "SELECT 
                *,
                customer.FirstName as cfn,
                customer.LastName as cln,
                employee.FirstName as efn,
                employee.LastName as eln,
                booking.Status as s
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.AppointmentDate = '$date' and
                booking.CustomerID = customer.CustomerID
            ",null);
   
    }
    
    public function admin_search_all_appointments($query, $start = false)
    {
        $limit =RESULT_LIMIT;
        if(!$start)
        {
          return $this->executeSql
          (
            "SELECT 
                *,
                customer.FirstName as cfn,
                customer.LastName as cln,
                employee.FirstName as efn,
                employee.LastName as eln,
                booking.Status as s
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                (
                    customer.FirstName LIKE '%$query%' OR
                    booking.AppointmentDate LIKE '%$query%' OR
                    customer.LastName Like '%$query%' OR
                    employee.FirstName Like '%$query%' OR
                    employee.LastName LIKE '%$query%' OR
                    customer.CustomerID = '$query' OR
                    employee.EmployeeID = '$query' OR
                    booking.BookingID = '%$query%' OR 
                    booking.Status = '$query'
                )
                and
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.CustomerID = customer.CustomerID
                ORDER BY booking.AppointmentDate ASC
                LIMIT $limit
            ",null);
        }
        else
        {
            $start = $start * $limit;
            return $this->executeSql
            (
            "SELECT 
                *,
                customer.FirstName as cfn,
                customer.LastName as cln,
                employee.FirstName as efn,
                employee.LastName as eln,
                booking.Status as s
            FROM 
                `appointment`,
                `booking`,
                `service`,
                `employee`,
                `customer`
            WHERE 
                (
                    customer.FirstName LIKE '%$query%' OR
                    booking.AppointmentDate LIKE '%$query%' OR
                    customer.LastName Like '%$query%' OR
                    employee.FirstName Like '%$query%' OR
                    employee.LastName LIKE '%$query%' OR
                    customer.CustomerID = '$query' OR
                    employee.EmployeeID = '$query' OR
                    booking.BookingID = '%$query%' OR 
                    booking.Status = '$query'

                )
                and
                booking.ServiceID = service.ServiceID and 
                booking.EmployeeID= employee.EmployeeID and 
                appointment.AppointmentID =  booking.AppointmentID and
                booking.CustomerID = customer.CustomerID
                ORDER BY booking.AppointmentDate ASC
                LIMIT $start,$limit

            ",null);
        }
   
    }

    //END APPOINTMENTS

    //ADMIN SERVICES
        public function admin_get_services($param = false,$start = false)
        {
            $limit = RESULT_LIMIT;
            if($start)$start = $start * $limit;
            $sql = "SELECT 
                        * 
                    FROM 
                        `service`,
                        `servicedescription`,
                        `servicecategory`,
                        `serviceprice`
                    WHERE
                        service.ServiceID = servicedescription.ServiceID and
                        service.Category = servicecategory.categoryname  and
                        service.ServicePriceID = serviceprice.ServicePriceID 
                    limit $start,$limit";
            if($param)
            {
                $sql = "SELECT 
                            *    
                        FROM 
                            `service`,
                            `servicedescription`,
                            `servicecategory`,
                            `serviceprice`
                        WHERE
                            (
                                service.ServiceName Like '%$param%' OR
                                service.Category LIKE '%$param%'
                            ) and
                            service.ServiceID = servicedescription.ServiceID and
                            service.Category = servicecategory.categoryname and
                            service.ServicePriceID = serviceprice.ServicePriceID 
                            
                        limit 
                            $start,$limit";
            }
            return $this->executeSql($sql, null);
        }

        //counting
        public function admin_count_services($param = false)
        {
            $sql = "SELECT count(*) FROM `service`";
            if($param) 
                $sql = "SELECT count(*) FROM `service` 
                where 
                        (
                            service.ServiceName Like '%$param%' OR
                            service.Category LIKE '%$param%'
                        )";
            return $this->executeSql($sql, null);
        }
        function service_edit_status($id, $newStatus)
        {
            return $this->executeSql("UPDATE `service` SET serviceStatus=".$newStatus." WHERE ServiceID=".$id,null);
        }
        function appointment_edit_status($id, $newStatus)
        {
            return $this->executeSql("UPDATE `booking` SET Status='".$newStatus."' WHERE BookingID=".$id,null);
        }
    //END ADMIN SERVICES

    //ADMIN EMPLOYEES
        public function admin_get_employees($param = false,$start = false)
        {
            $limit = RESULT_LIMIT;
            if($start)$start = $start * $limit;
            $sql = "SELECT 
                        * 
                    FROM 
                        `employee`
                    limit $start,$limit";
            if($param)
            {
                $sql = "SELECT 
                            *    
                        FROM 
                            `employee`
                        WHERE
                            employee.FirstName Like '%$param%' OR
                            employee.LastName LIKE '%$param%' OR
                            employee.UserName LIKE '%$param%'
                        limit 
                            $start,$limit";
            }
            return $this->executeSql($sql, null);
        }

        //counting
        public function admin_count_employees($param = false)
        {
            $sql = "select count(*) from `employee`";
            if($param) 
                $sql = "SELECT count(*) FROM `employee` 
                where 
                        employee.FirstName Like '%$param%' OR
                        employee.LastName LIKE '%$param%' OR
                        employee.UserName LIKE '%$param%'";
            return $this->executeSql($sql, null);
        }

        function employee_edit_status($id, $newStatus)
        {
            return $this->executeSql("UPDATE `employee` SET Status=".$newStatus." WHERE EmployeeID=".$id,null);
        }
    //END ADMIN EMPLOYEES

    //ADMIN HELP
    public function admin_get_count_messages($param = false)
    {
        
        $sql = 
        "SELECT 
            count(*) 
        FROM 
            `message` 
        WHERE 
            ReceipentID = '0'";
        if($param)
        {
                 $sql = 
                "SELECT 
                    count(*)
                FROM 
                    `message`
                WHERE 
                    (
                        message.ReceipentID = '0' and
                        message.SenderID = customer.CustomerID ) and 
                     (
                        message.messageTitle Like '%$param%'
                    )
                ";
        }
        return $this->executeSql($sql, null);
    }
    public function admin_get_message_id ($q)
    {
        return $this->executeSql("SELECT * from `message` where MessageID= :id", array(':id' => $q['messageid']));
    }
    public function admin_get_messages($param = false,$start = false)
    {
        $limit = RESULT_LIMIT;
        if($start)$start = $start * $limit; 
        $sql = 
            "SELECT 
                *
            FROM 
                `message`,
                `customer`
            WHERE 
                message.ReceipentID = '0' and
                message.SenderID = customer.CustomerID
                limit $start,$limit
    ";
        if($param)
        {
             $sql = 
                "SELECT 
                    *
                FROM 
                    `message`,
                    `customer`
                WHERE 
                    (
                        message.ReceipentID = '0' and
                        message.SenderID = customer.CustomerID ) and 
                     (
                        message.messageTitle Like '%$param%'
                    )
                limit $start,$limit

                ";
        }
        return $this->executeSql($sql, null);
    }

    function admin_delete_message($q)
    {
        return $this->executeSql("DELETE FROM `message` where MessageID= :id" , array(':id' => $q));
    }
    //END ADMIN HELP

    //ADMIN PROMO
    function admin_get_promo($param = false ,$start = false)
    {
        $limit = RESULT_LIMIT;
        if($start) $start *= $limit;
        else $start =0;
        $sql = "SELECT * FROM `promo`, `service` where promo.ServiceID =  service.ServiceID limit $start,$limit";
        if($param)
        {
             $sql = "SELECT * FROM `promo`, `service` 
             where 
             (
                promo.promoName Like '%$param%' OR
                promo.couponID = '$param')
                and 
                promo.ServiceID =  service.ServiceID 
             
             limit $start,$limit";
       
        }
       return $this->executeSql($sql, null);
    }
     function admin_get_promo_count($param = false ,$start = false)
    {
       
        $sql = "SELECT count(*) FROM `promo`, `service` where promo.ServiceID =  service.ServiceID ";
        if($param)
        {
             $sql = "SELECT count(*) FROM `promo`, `service` 
             where 
                (
                    promo.promoName Like '%$param%' OR
                    promo.couponID = '$param')
                    and 
                    promo.ServiceID =  service.ServiceID ";
        }
       return $this->executeSql($sql, null);
    }
    
       function promo_edit_status($id, $newStatus)
        {
            return $this->executeSql("UPDATE `promo` SET Status=".$newStatus." WHERE promoID=".$id,null);
        }
    //END ADMIN PROMO


    public function get_services()
    {
        return $this->executeSql("SELECT * FROM `servicecategory`",null);
    }

    public function get_employees()
    {
    	return $this->executeSql("SELECT * FROM `employee`",null);
    }
    public function get_appointments($id)
    {
        return $this->executeSql("SELECT * FROM `appointment`,`booking`,`service`,`employee` where `CustomerID`= :id and booking.ServiceID = service.ServiceID and booking.EmployeeID= employee.EmployeeID and appointment.AppointmentID =  booking.AppointmentID",array(':id' => $id));
    }
    public function get_appointmentsws($id,$status)
    {
        return $this->executeSql("SELECT * FROM `appointment`,`booking`,`service`,`employee` where `CustomerID`= :id and booking.ServiceID = service.ServiceID and booking.EmployeeID= employee.EmployeeID and appointment.AppointmentID =  booking.AppointmentID and booking.Status = '$status'",array(':id' => $id));
    }
    function get_appointments_cview($id)
    {
           return $this->executeSql("SELECT *,booking.Status as s FROM `appointment`,`booking`,`service`,`employee` where `CustomerID`= :id and booking.ServiceID = service.ServiceID and booking.EmployeeID= employee.EmployeeID and appointment.AppointmentID =  booking.AppointmentID",array(':id' => $id));
  
    }
    public function get_appointmentswbid($id,$bid)
    {
        $sql = 
        "SELECT
            * ,
            a.id as apid ,
            b.AppointmentID as bapid
        FROM 
            `appointment` a,
            `booking` b,
            `service` s,
            `employee` e
        where 
            BookingID= :bid and 
            CustomerID = :id and 
            b.ServiceID = s.ServiceID and 
            b.EmployeeID= e.EmployeeID and 
            appointment.AppointmentID =  booking.AppointmentID";
        return $this->executeSql($sql,array(':id' => $id, ':bid'=> $bid));
    }

    public function get_service_description($serviceID)
    {
        return $this->executeSql("SELECT 
            * 
        FROM 
            `servicedescription`
        where 
            ServiceID= :id
        " , 
        array(':id' =>$serviceID))   ;
    }
    public function get_service_name($serviceID)
    {
        return $this->executeSql("SELECT 
            * 
        FROM 
            `service`
        where 
            ServiceID= :id
        " , 
        array(':id' =>$serviceID))   ;
    }
     public function get_service_descriptionByName($q)
    {
        return $this->executeSql("
            SELECT * 
            FROM 
                servicedescription,
                service
             where 
                (service.ServiceName like ? OR 
                servicedescription.Description like ? OR
                service.ServiceName = ? )and
                servicedescription.serviceID = service.serviceID
            " , array('%'.$q.'%', '%'.$q.'%',$q));
    }
    public function checkout($id,$bid)
    {
        $sql = 
        "SELECT
        *,
            c.FirstName as fname,
            c.LastName as lname,
            e.FirstName as efname,
            e.LastName as elname
        FROM 
            `appointment` a,
            `booking` b,
            `service` s,
            `employee` e,
            `customer` c,
            `serviceprice` sp
        where 
            b.BookingID= :bid and 
            b.CustomerID = :id and 
            b.ServiceID = s.serviceID and
            a.appointmentID = b.appointmentID and
            c.CustomerID = :id and 
            sp.servicePriceID = b.servicePriceID and
            b.EmployeeID = e.EmployeeID

            ";
        return $this->executeSql($sql,array(':id' => $id, ':bid'=> $bid));
    }
    public function get_service_search($q)
    {
        return $this->executeSql("
            SELECT * 
            FROM 
                service
             where 
                service.ServiceName like ? OR 
                service.ServiceName = ? 
            " , array('%'.$q.'%', $q));
    }
    public function get_customer($param)
    {
        return $this->executeSql("select * from `customer` where CustomerID= :id", array(':id' => $param));
    }
    public function get_employee($param)
    {
        return $this->executeSql("select * from `employee` where EmployeeID= :id", array(':id' => $param));
    }
    public function get_service_price()
    {
        return $this->executeSql("select * from serviceprice",null);
    }
    public function promo_get_service_names()
    {
        return $this->executeSql("SELECT * from service",null);
    }
    public function service_get_service_names($id)
    {
        return $this->executeSql("SELECT * from `service`,
                    `serviceprice`
         where 
            service.ServiceID=:id and service.ServicePriceID = serviceprice.ServicePriceID",array(':id' => $id));
    }
   
}
