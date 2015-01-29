<?php
  $limit =RESULT_LIMIT;
?>
  <div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
          <h2>Beaucharm Customers</h2>

          <div class="row rowspace">
              <div class="col-lg-12 col-sm-12">     
                <div class="col12_layout">
                  <div class="well">
                       <form class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Customer</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search Customer">
                        </div>
                        </form>
                        <br/><br/>

                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Customer ID</th>
                                  <th>Email Address</th>
                                  <th>Last Name</th>
                                  <th>Fist Name</th>
                                  <th>Contact Number</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                             <?php
                               foreach ($this->d['customers'] as $key => $value) 
                                {
                                    echo '<tr>';
                                    echo '<td>'.$value['CustomerID'].'</td>';
                                    echo '<td>'.$value['EmailAddress'].'</td>';
                                    echo '<td>'.$value['LastName'].'</td>';
                                    echo '<td>'.$value['FirstName'].'</td>';
                                    echo '<td>'.$value['ContactNumber'].'</td>';
                                    echo '<td><a href="'.URL.'cpanel/customer_view/@customerid='.$value['CustomerID'].'"><button type="button" class="btn btn-primary btn-xs">View Profile</button></a>
                                    <a href="'.URL.'myaccount?customerid='.$value['CustomerID'].'"><button type="button" class="btn btn-primary btn-xs">Add Appointment</button></a>
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


<div class="modal fade" id="ModalUpdateAcc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Select a data you want to Edit</h4>
      </div>


      <div class="modal-body">
        <form class="form-inline text-center form_space" role="form">

          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Last Name</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Last Name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">First Name</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="First Name">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
            <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Birthdate</label>
            <input type="email" class="form-control" id="date" placeholder="Birthdate">
          </div>

          <div class="form-group">
            <select class="form-control formAlign">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </form>
        
        <form class="form-inline text-center form_space" role="form">
            <div class="form-group formAlign2">
            <textarea class="form-control" rows="2" placeholder="Home Address"></textarea>
          </div>

          <div class="form-group">
            <textarea class="form-control" rows="2" placeholder="Business Address"></textarea>
          </div>
        </form>
        
        <form class="form-inline text-center form_space" role="form">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Contact Number</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Contact Number">
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">First Name</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Business Contact Number">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Occupation</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Occupation">
          </div>

          <div class="form-group">
            <select class="form-control formAlign">
              <option>Single</option>
              <option>Married</option>
            </select>
          </div>
        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Revert</button>
        <button type="button" class="btn btn-default">Save Changes</button>
      </div>
    </div>
  </div>
</div>

    </div>
  </div>
</div><!--/row-offcanvas -->
  
  
</body>
</html>