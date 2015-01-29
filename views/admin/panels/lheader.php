<body>

  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Beaucharm Derma Admin</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php 
              if(session_id() ==='')session_start();
              if(isset($_SESSION['admin']))
                if(isset($_SESSION['admin']['admin_name']))
                  echo 'Welcome '.$_SESSION['admin']['admin_name'];
            ?>
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="divider"></li>
            <li><a href="<?php ECHO URL;?>logout">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--Edit Employee Profile-->
<div class="modal fade" id="ModalEditEmp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">My Profile</h4>
      </div>
      <div class="modal-body">
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
        </form>
        
        <form class="form-inline text-center form_space" role="form">
        <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Contact Number</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Contact Number">
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

<script src="bootstrap/js/jquery-ui.js"></script>
<script src="js/ui.js"></script>