<?php 
  $this->servicescategory = array();
  for($i = 0 ; $i < count($this->d['servicescategory']); $i++)
  {
    $s = new obj_servicecategory();
    $s->sc_id = $this->d['servicescategory'][$i]['categoryid'];
    $s->sc_name = $this->d['servicescategory'][$i]['categoryname'];
    array_push($this->servicescategory, $s);
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

</div>
</div><!-- End po ng buong Index Page Content -->
</body>
</html>
