<?php 
  $this->servicescategory = array();
  for($i = 0 ; $i < count($this->d['servicescategory']); $i++)
  {
    $s = new obj_servicecategory();
    $s->sc_id = $this->d['servicescategory'][$i]['categoryid'];
    $s->sc_name = $this->d['servicescategory'][$i]['categoryname'];
    array_push($this->servicescategory, $s);
  }
  //$this->employee = array();
  //for($i = 0 ; $i < count($this->d['employees']); $i++)
 // {
   // $s = new obj_employee();
   // $s->e_id = $this->d['employees'][$i]['EmployeeID'];
   // $s->e_fname = $this->d['employees'][$i]['FirstName'];
    //$s->e_lname = $this->d['employees'][$i]['LastName'];
    //array_push($this->employee, $s);
 // }

  $this->appointments = array();
   for($i = 0 ; $i < count($this->d['appointments']); $i++)
  {
    $s = new obj_booking();
    $s->b_id = $this->d['appointments'][$i]['BookingID'];
    $s->b_cid = $this->d['appointments'][$i]['CustomerID'];
    $s->b_datebooked = $this->d['appointments'][$i]['DateBooked'];
    $s->s_id = $this->d['appointments'][$i]['ServiceID'];
    $s->s_pid = $this->d['appointments'][$i]['ServicePriceID'];
    $s->e_id = $this->d['appointments'][$i]['EmployeeID'];
    $s->s_apd = $this->d['appointments'][$i]['AppointmentDate'];
    $s->s_apid = $this->d['appointments'][$i]['AppointmentID'];
    $s->s_name = $this->d['appointments'][$i]['ServiceName'];
    $s->s_category = $this->d['appointments'][$i]['Category'];
    $s->e_name = $this->d['appointments'][$i]['FirstName']." ".$this->d['appointments'][$i]['LastName'];
    $s->a_from = $this->d['appointments'][$i]['from'];
    $s->a_to = $this->d['appointments'][$i]['to'];
    array_push($this->appointments, $s);
  }
  $this->oappointments = array();
   for($i = 0 ; $i < count($this->d['oldappointments']); $i++)
  {
    $s = new obj_booking();
    $s->b_id = $this->d['oldappointments'][$i]['BookingID'];
    $s->b_cid = $this->d['oldappointments'][$i]['CustomerID'];
    $s->b_datebooked = $this->d['oldappointments'][$i]['DateBooked'];
    $s->s_id = $this->d['oldappointments'][$i]['ServiceID'];
    $s->s_pid = $this->d['oldappointments'][$i]['ServicePriceID'];
    $s->e_id = $this->d['oldappointments'][$i]['EmployeeID'];
    $s->s_apd = $this->d['oldappointments'][$i]['AppointmentDate'];
    $s->s_apid = $this->d['oldappointments'][$i]['AppointmentID'];
    $s->s_name = $this->d['oldappointments'][$i]['ServiceName'];
    $s->s_category = $this->d['oldappointments'][$i]['Category'];
    $s->e_name = $this->d['oldappointments'][$i]['FirstName']." ".$this->d['oldappointments'][$i]['LastName'];
    $s->a_from = $this->d['oldappointments'][$i]['from'];
    $s->a_to = $this->d['oldappointments'][$i]['to'];
    array_push($this->oappointments, $s);
  }
?>
<div class="container">

<section>
        <div class="row">
                <!-- Carousel section -->
              <div class="jumbospace">
               <div class="col-md-7">
                <h4 class="hdr3">Book an appointment</h4>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseOne">
                          Setting up your itinerary
                        </a>
                      </h4>
                    </div>
                    <div id="myaccount_collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        <h4>Select service/s you want to reserve</h4>
                        <select id="myaccount_select_category">
                          <option value="category" >Service Category</option>
                          <?php 
                            foreach ($this->servicescategory as $value)
                            {
                                echo '<option value="'.$value->sc_name.'">'.$value->sc_name.'</option>';
                            }
                          ?>
                        </select>
                        <select id="myaccount_select_servicename">
                          <option value="service_name">Service name</option>
                        </select>
                       
                      <div class="panel-body">
                        <h4>When and whom you want to serve you?</h4>
                        <input id="date" type="text" placeholder="select date here">
                        <select id="myaccount_select_employee">
                          <option value="Employee">Employee Name</option>
                           <?php 
                            foreach ($this->employee as $value)
                            {
                                //echo '<option value="'.$value->e_id.'">'.$value->e_lname.', '.$value->e_fname.'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    </div>


                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseTwo">
                          Selecting your Appointment Schedules
                        </a>
                      </h4>
                    </div>
                    <div id="myaccount_collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <h4>List of available schedules for <span id="myaccount_txt_currentService"> </span></h4>
                      
                                  <button type="button" class="btn btn-default" style="witdth:100%;align:center" id="myaccount_btn_findEmployees" disabled='true'>Find Available Appointments</button>
                           
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Assigned Crew</th>
                                    <th>&nbsp;</th>
                                </tr>

                            </thead>
                            <tbody  id="myaccount_tbody_employeeList">
                              
                             
                            </tbody>
                        </table>

                      </div>
                    </div>
                    </div>

                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseThree">
                          Finalizing your Appointment
                        </a>
                      </h4>
                    </div>
                    <div id="myaccount_collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        <h4>Right now, I'm booking</h4>
                        <ul class="booking_final">
                            <li>Service/s Name</li><label id="myaccount_lbl_serviceName"></label>
                            <li>Date of Appointment</li> <label id="myaccount_lbl_appointmentDate"></label>
                            <li>Crew/s Assigned</li><label id="myaccount_lbl_employeeName"></label>
                        </ul>
                      </div>

                      <div class="panel-body">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" value="" id="myaccount_checkbox_terms">
                            I agree to the terms and conditions
                          </label>
                        </div>
                        <button type="button" class="btn btn-default" >Revert</button> <button type="button" class="btn btn-default" id="myaccount_btn_bookIt" disabled='true' alt="Agree to the terms to book this appointment.">Book It</button>
                      </div>
                    </div>
                    </div>
                </div>
               </div>
            <!-- End of Carousel Section-->
            
            <!--Caption/Tagline Section-->
            <div class="col-md-5">
                <div class="row">
                <h4 class="hdr3">My Appointments</h4>
                <table class="table table-responsive table-hover profile_table-design">
                            <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Date of Appointment</th>
                                    <th>Assigned Crew</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            foreach ($this->appointments as $value)
                            {
                                
                                echo '<tr>';
                                echo '<td>'.$value->s_name.'</td>';
                                echo '<td>'.$value->s_apd.'</td>';
                                echo '<td>'.$value->e_name.'</td>';
                                echo '<td>'.$value->a_from.'</td>';
                                echo '<td>'.$value->a_to.'</td>';
                                echo '</tr>';
                            }
                          ?>
                            </tbody>
                    </table>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalAppoints">
                         View All
                        </button>
                        
                    </div>

                <div class="row">
                <h4 class="hdr3">My Previous Transactions</h4>
                <table class="table table-responsive table-hover profile_table-design">
                            <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Date of Appointment</th>
                                    <th>Assigned Crew</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                            foreach ($this->oappointments as $value)
                            {
                                
                                echo '<tr>';
                                echo '<td>'.$value->s_name.'</td>';
                                echo '<td>'.$value->s_apd.'</td>';
                                echo '<td>'.$value->e_name.'</td>';
                                echo '<td>'.$value->a_from.'</td>';
                                echo '<td>'.$value->a_to.'</td>';
                                echo '</tr>';
                            }
                          ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#ModalPrevTransac">
                         View All
                        </button>
                    </div> 
            </div>
            <!--End of Caption/Tagline Section-->
            </div>
        </div>

    </section>

    <script src="js/jquery-ui.js"></script>
    <script src="js/ui.js"></script>

<!--My Appointments Modal-->
<div class="modal fade" id="ModalAppoints" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">My Appointments</h4>
      </div>

      <div class="modal-body">

        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Service Category</th>
                    <th>Date of Appointment</th>
                    <th>Assigned Crew</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                        <?php 
                            foreach ($this->appointments as $value)
                            {
                                                                
                                echo '<tr>';
                                echo '<td>'.$value->s_name.'</td>';
                                echo '<td>'.$value->s_category.'</td>';
                                echo '<td>'.$value->s_apd.'</td>';
                                echo '<td>'.$value->e_name.'</td>';
                                echo '<td>'.$value->a_from.'</td>';
                                echo '<td>'.$value->a_to.'</td>';
                                echo '</tr>';
                            }
                        ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
            <ul class="pagination">
              <li><a href="#">&laquo;</a></li>
            </ul>
      </div>
    </div>
  </div>
</div>

<!--My Previous Transactions Modal-->
<div class="modal fade" id="ModalPrevTransac" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">My Previous Transactions</h4>
      </div>

      <div class="modal-body">

        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Date of Appointment</th>
                    <th>Assigned Crew</th>
                </tr>
            </thead>
            <tbody>
                 <?php 
                            foreach ($this->oappointments as $value)
                            {
                                
                                echo '<tr>';
                                echo '<td>'.$value->s_name.'</td>';
                                echo '<td>'.$value->s_apd.'</td>';
                                echo '<td>'.$value->e_name.'</td>';
                                echo '<td>'.$value->a_from.'</td>';
                                echo '<td>'.$value->a_to.'</td>';
                                echo '</tr>';
                            }
                          ?>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
     
      </div>
    </div>
  </div>
</div>
</div><!-- End po ng buong Index Page Content -->
</body>
</html>
