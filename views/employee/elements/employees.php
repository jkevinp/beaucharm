<?php
?>
  <div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
          <h2>Beaucharm Employees</h2>

          <div class="row rowspace">
              <div class="col-lg-12 col-sm-12">     
                <div class="col12_layout">
                  <div class="well">
                       
                       <button class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalAddEmp">
                          Add an Employee
                       </button>
                       
                       <form class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Employee</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search Employee">
                        </div>
                        </form>
                          <br/><br/>

                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Employee ID</th>
                                  <th>Username</th>
                                  <th>Last Name</th>
                                  <th>First Name</th>
                                  <th>Contact Number</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                            
                             <?php
                               foreach ($this->d['employees'] as $key => $value) 
                                {
                                    echo '<tr>';
                                    echo '<td>'.$value['EmployeeID'].'</td>';
                                    echo '<td>'.$value['Username'].'</td>';
                                    echo '<td>'.$value['LastName'].'</td>';
                                    echo '<td>'.$value['FirstName'].'</td>';
                                    echo '<td>'.$value['ContactNumber'].'</td>';
                                    echo '<td>
                                    <a href="'.URL.'cpanel/employee_view/@employeeid='.$value['EmployeeID'].'"><button type="button" class="btn btn-primary btn-xs">Edit/View Profile</button></a>
                                     ';

                                    if($value['Status'] === '1' ||$value['Status'] === 1 )
                                    {
                                      echo '<a href="'.URL.'cpanel/employee_edit_status/@employeeid='.$value['EmployeeID'].'@status=0"><button type="button" class="btn btn-primary btn-xs">Deactivate</button></a>';
                                    
                                    }else{
                                      echo ' <a href="'.URL.'cpanel/employee_edit_status/@employeeid='.$value['EmployeeID'].'@status=1"><button type="button" class="btn btn-primary btn-xs">Activate</button></a>';
                                    
                                    }

                                     echo '</td>';
                                echo '</tr>';
                                }
                             ?>
                             
                                
                          </tbody>
                      </table>
                    <ul class="pagination">
                        <?php 
                          $total = (int)($this->d['count'][0]['count(*)']);
                          $page = floor($total / RESULT_LIMIT) ;
                          $url = isset($_GET['url']) ? $_GET['url'] : null;
                          $actual_link = "http://$_SERVER[HTTP_HOST]/".APP_NAME.'/'.$url;
                          $v = explode('@', $actual_link);
                          
                          for($x = 0; $x < ($total / RESULT_LIMIT); $x++)
                          {
                                echo ' <li><a href="'.$v[0].'@page='.$x.'">'.($x +1).'</a></li>';
                          }
                        ?>
                           
                      </ul>
                  </div>
                </div>
              </div>
          </div>

<!--Add Employee Modal-->

<div class="modal fade" id="ModalAddEmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
      </div>
      <div class="modal-body">
        <p>Fill up the whole form to add new Employee</p>
        <form class="form-inline text-center" role="form">
          <div class="form-group">
            <label class="sr-only" for="header_txt_email">Email address</label>
            <input type="email" class="form-control" id="header_txt_email" placeholder="Enter email">
          </div>
           </form>
           <form class="form-inline text-center" role="form">
          <div class="form-group">
            <label class="sr-only" for="header_txt_password">Password</label>
            <input type="password" class="form-control" id="header_txt_password" placeholder="Password">
          </div>
        </form>
         <form class="form-inline text-center" role="form">
         <div class="form-group">
            <label class="sr-only" for="header_txt_password1">Confirm Password</label>
            <input type="password" class="form-control" id="header_txt_password1" placeholder="Confirm Password">
          </div>
        </form>
        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="header_txt_lastname">Last Name</label>
            <input type="email" class="form-control" id="header_txt_lastname" placeholder="Last Name">
          </div>
        </form>
         
           </form>
             <form class="form-inline text-center formSpace" role="form">
          <div class="form-group">
            <label class="sr-only" for="header_txt_firstname">First Name</label>
            <input type="email" class="form-control" id="header_txt_firstname" placeholder="First Name">
          </div>
        </form>

        <form class="form-inline text-center formSpace" role="form">
            <div class="form-group">
            <label class="sr-only" for="header_txt_birthday">Birthdate</label>
            <input type="email" class="form-control date"  placeholder="Birthdate [1993-02-28]" id="header_txt_birthday">
          </div>
        </form>
         <form class="form-inline text-center formSpace" role="form">
          <div class="form-group">
           <select class="form-control formAlign" id="header_select_gender" style="width:197px;">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </form>
        <form class="form-inline text-center formSpace" role="form">
            <div class="form-group">
            <textarea class="form-control" rows="2" style="width:197px;" placeholder="Home Address" id="header_txt_homeaddress"></textarea>
          </div>
        </form>
      
        
        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="header_txt_contactnumber">Contact Number</label>
            <input type="email" class="form-control" id="header_txt_contactnumber" placeholder="Contact Number">
          </div>
        </form>
       
      
         <form class="form-inline text-center formSpace" role="form">
          <div class="form-group">
            <select class="form-control formAlign" id="header_select_civilstatus" style="width:197px;">
              <option>Single</option>
              <option>Married</option>
            </select>
          </div>
        </form>
        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <select id="service_category" class="form-control formAlign" style="width:197px;">
              <option value="-1">Select Skill</option>
              <?php
              foreach ($this->d['categories'] as $v) 
              {
                  echo '<option value="'.$v['categoryid'].'">'.$v['categoryname'].'</option>';
              }
              ?>
             </select> 
           </div>
        </form>
    </div>

      <div class="modal-footer">
           
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" id="index_btn_register">Add Employee</button>
      </div>
    </div>
  </div>
</div>
<!--END Add Employee Modal-->



      </div>
  </div>
</div><!--/row-offcanvas -->
  
  
</body>
</html>