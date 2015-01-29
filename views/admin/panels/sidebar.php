<div class="row-offcanvas row-offcanvas-left">
  <div id="sidebar" class="sidebar-offcanvas">
      <div class="col-md-12">
        <ul class="nav nav-pills nav-stacked sidespace">
          <?php
            if(isset($_SESSION['admin']['access'])){
                echo '  
          <li><a href="'.URL.'cpanel/appointments/">Appointments</a></li>
          <li><a href="'.URL.'cpanel/customers/">Customers</a></li>';
            }else{
              echo  '<li><a href="'.URL.'cpanel/dashboard/">Dashboard</a></li>
                    <li><a href="'.URL.'cpanel/appointments/">Appointments</a></li>
                    <li><a href="'.URL.'cpanel/customers/">Customers</a></li>
                    <li><a href="'.URL.'cpanel/services/">Services</a></li>
                    <li><a href="'.URL.'cpanel/promos/">Promos</a></li>
                    <li><a href="'.URL.'cpanel/employees/">Employees</a></li>
                    <li><a href="'.URL.'cpanel/help/">Help and Support</a></li>';
            }
          ?>
        
        </ul>
      </div>
  </div>