<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="css/jquery-ui.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
  
  <script src="bootstrap/js/jqueryPlugin.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
  <script src="js/admin.js"></script>

<title>Document</title>
</head>
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
    
  </div><!-- /.container-fluid -->
</nav>

<!--Edit Admin Profile-->
<div class="modal fade" id="ModalEditAdmn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!--Change Password-->
<div class="modal fade" id="ModalChangePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Fill the form to change your Password</h4>
      </div>

      <div class="modal-body">

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Type your new Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" placeholder="Retype your new Password">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Revert</button>
        <button type="button" class="btn btn-default">Change Password</button>
      </div>
    </div>
  </div>
</div>

<script src="bootstrap/js/jquery-ui.js"></script>
<script src="js/ui.js"></script>