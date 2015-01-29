<?php

?>	
<div class="container">
	<section>
        <div class="row">
            <div class="jumbospace">
                <div class="col-md-10">
                	<h4 class="hdr3">Customer Profile View</h4>
                	<div class="panel-group" id="accordion">
                    	<div class="panel panel-default">
                    		<div class="panel-heading">
                      			<h4 class="panel-title">
                        			<a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseOne">Customer Information</a>
                      			</h4>
                    		</div>
                    		<div id="myaccount_collapseOne" class="panel-collapse collapse in">
                      			<div class="panel-body">
                        			<h4>Customer Information</h4>
					                        <table class="table table-responsive table-hover">
					                            <thead>
					                                <tr>
					                                    <th>Field</th>
					                                    <th>Data</th>
					                                </tr>
					                            </thead>
					                            <tbody>
					                                <?php
                                            for ($r = 0; $r < count($this->d['customer'][0]); $r++) 
                                            {
                                              if(key($this->d['customer'][0]) != "Password")
                                              {
                                                echo '<tr>';
                                                echo '<td>';
                                                echo key($this->d['customer'][0]);
                                                echo '</td>';
                                                echo '<td>';
                                                echo current($this->d['customer'][0]);
                                                echo '</td>';
                                                echo '</tr>';
                                                
                                              }
                                                next($this->d['customer'][0]);
                                            }
                                          
                                          ?>
                                        
					                            </tbody>
					                        </table>
                    			</div>
                    		</div>


                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseTwo">
                          Appointments
                        </a>
                      </h4>
                    </div>
                    <div id="myaccount_collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        <h4>List of Appointments <span id="myaccount_txt_currentService"> </span></h4>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                	<th>Service Booked</th>
                                  <th>Employee Assigned</th>
                                  <th>Booked Date</th>
                                  <th>Date of Appointment</th>
                                  <th>Status</th>
                                  <th colspan="4">Actions</th>
                                </tr>

                            </thead>
                            <tbody  id="myaccount_tbody_employeeList">
                              
                              <?php
                                foreach ($this->d['appointments'] as $key => $value)
                                {
                                   echo '<tr>';
                                    
                                    echo '<td>'.$value['ServiceName'].'</td>';
                                    echo '<td>'.$value['FirstName'].' '.$value['LastName'].'</td>';
                                    echo '<td>'.$value['DateBooked'].'</td>';
                                    echo '<td>'.$value['AppointmentDate'].'</td>';
                                    echo '<td>'.$value['s'].'</td>';
                                    

                                     echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=1"><button type="button" class="btn btn-primary btn-xs">Wait</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=2"><button type="button" class="btn btn-primary btn-xs">On Transaction</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=3"><button type="button" class="btn btn-primary btn-xs">Finish</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=4"><button type="button" class="btn btn-primary btn-xs">Cancel</button></a>
                                     </td>';
                                    echo '</td></tr>';
                                }        
                              ?>
                            </tbody>
                        </table>

                      </div>
                    </div>
                    </div>
                </div>
            </div>
                </div>
    <script src="js/jquery-ui.js"></script>
    <script src="js/ui.js"></script>


</div><!-- End po ng buong Index Page Content -->
  </section>
</div>
</body>
</html>
