<?php
  $limit = RESULT_LIMIT;
?>
  <div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>

          <h2>Current Appointments</h2>
          <div class="row rowspace">
              <div class="col-lg-12 col-sm-12">     
                <div class="col12_layout">
                  <div class="well">
                    <h3>Current Appointments</h3>
                      <div class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Appointment</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search appointment">
                          <select id="appointment_status">
                            <OPTION value="">Select Status</OPTION>
                            <OPTION value="On Transaction">On Transaction</OPTION>
                            <OPTION value="On Queue">On Queue</OPTION>
                            <OPTION value="Finished">Finished</OPTION>
                            <OPTION value="Cancelled">Cancelled</OPTION>
                          </select> 
                        </div>
                        </div>

                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Customer Name</th>
                                  <th>Service Booked</th>
                                  <th>Employee Assigned</th>
                                  <th>Booked Date</th>
                                  <th>Date of Appointment</th>
                                  <th>Appointment Time </th>
                                  <th>Status</th>
                                  <th colspan="4">Change Status</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                               
                                foreach ($this->d['appointments'] as $key => $value) 
                                {
                                    echo '<tr>';
                                    echo '<td>'.$value['cfn'].' '.$value['cln'].'</td>';
                                    echo '<td>'.$value['ServiceName'].'</td>';
                                    echo '<td>'.$value['efn'].' '.$value['eln'].'</td>';
                                    echo '<td>'.$value['DateBooked'].'</td>';
                                    echo '<td>'.$value['AppointmentDate'].'</td>';
                                    echo '<td>'.$value['from'].'</td>';
                                    echo '<td>'.$value['s'].'</td>';
                                     echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=1"><button type="button" class="btn btn-primary btn-xs">Wait</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=2"><button type="button" class="btn btn-primary btn-xs">On Transaction</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=3"><button type="button" class="btn btn-primary btn-xs">Finish</button></a>
                                     </td>';
                                      echo '<td><a href="'.URL.'cpanel/edit_appointment/@appointmentid='.$value['BookingID'].'@status=4"><button type="button" class="btn btn-primary btn-xs">Cancel</button></a>
                                     </td>';
                                    echo '</tr>';
                                }
                              ?>
                          </tbody>
                      </table>
                      <ul class="pagination">
                         <?php 
                          $total = (int)($this->d['count'][0]['count(*)']);
                          $page = floor($total / $limit);
                          $url = isset($_GET['url']) ? $_GET['url'] : null;
                          $actual_link = "http://$_SERVER[HTTP_HOST]/".APP_NAME.'/'.$url;
                          $v = explode('@', $actual_link);
                    
                          for($x = 0; $x < ($total / $limit); $x++)
                          {
                                echo ' <li><a href="'.$v[0].'@page='.$x.'">'.($x +1).'</a></li>';
                          }
                        ?>
                           
                      </ul>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </div>
</div><!--/row-offcanvas -->

    <script src="bootstrap/js/jquery-ui.js"></script>
    <script src="js/ui.js"></script>
  
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <h4 class="modal-title" id="myModalLabel">Add an Appointment</h4>
                            </div>

                            <div class="modal-body">
                              <div class="well">
                                <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                      Appointment For 
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                    <select>
                                      <option value="me">Master Kevin</option>
                                      <option value="pat">Patrick Lim</option>
                                      <option value="josh">Joshua Turingan</option>
                                    </select>
                                  </div>

                                  <div class="panel-body">
                                    <h4>Select a service to be reserve</h4>
                                    <select>
                                      <option value="category">Service Category</option>
                                    </select>

                                    <select>
                                      <option value="service_name">Service name</option>
                                    </select>
                                  </div>

                                  <div class="panel-body">
                                    <h4>Select date of appiontment and employee to serve</h4>
                                    <input id="date" type="text" placeholder="select date here">
                                    <select>
                                      <option value="volvo">Anyone</option>
                                      <option value="volvo">Master Patrick</option>
                                      <option value="volvo">JM Ramos</option>
                                    </select>
                                  </div>

                                   <div class="panel-body">
                                        <button type="button" class="btn btn-default">Find Appointments</button>
                                    </div>

                                </div>
                                </div>


                                <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                      Selecting Appointment Schedules
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <h4>List of available schedules for Facial Sensations</h4>
                                    
                                    <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>Start</th>
                                                <th>End</th>
                                                <th>Assigned Crew</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>8:00am</td>
                                                <td>9:00am</td>
                                                <td>Ace Pogi</td>
                                                <td><button type="button" class="btn btn-default">Select</button></td>
                                            </tr>
                                            <tr>
                                                <td>9:00am</td>
                                                <td>10:00am</td>
                                                <td>Joshua Turingan</td>
                                                <td><button type="button" class="btn btn-default">Select</button></td>
                                            </tr>
                                            <tr>
                                                <td>9:00am</td>
                                                <td>10:00am</td>
                                                <td>Patrick Lim</td>
                                                <td><button type="button" class="btn btn-default">Select</button></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                  </div>
                                </div>
                              </div>
                            </div>

                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>

</body>

