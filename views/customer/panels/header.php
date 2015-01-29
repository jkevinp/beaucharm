 <script src="<?php echo URL;?>public/js/header.js"></script>
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!--Logo Here-->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
          
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li><a href="#" id="header_aboutus">About Us</a></li>
                <li><a href="#" id="header_services">Services</a></li>
                <li><a href="#" data-toggle="modal" data-target="#ModalRegister">Book Now</a></li>
                <li><a href="#" data-toggle="modal" data-target="#ModalLogin">Sign In</a></li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
















<!-- Modal Registration -->
<div class="modal fade" id="ModalRegister" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Register now to experience our services</h4>
      </div>
      <div class="modal-body">
        <p>Fill up the whole form for your registration</p>
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
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
            <textarea class="form-control" rows="2" style="width:197px;" placeholder="Business Address" id="header_txt_businessaddress"></textarea>
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
            <label class="sr-only" for="header_txt_firstname">Business Contact Number</label>
            <input type="email" class="form-control" id="header_txt_bcontactnumber" placeholder="Business Contact Number">
          </div>
        </form>
        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="header_txt_occupation">Occupation</label>
            <input type="email" class="form-control" id="header_txt_occupation" placeholder="Occupation">
          </div>
        </form>
         <form class="form-inline text-center formSpace" role="form">
          <div class="form-group">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;
            <select class="form-control formAlign" id="header_select_civilstatus" style="width:197px;">
              <option>Single</option>
              <option>Married</option>
            </select>
          </div>
        </form>
    </div>


          <form>
           
             <a class="btn pop"  rel="popover" href="#" data-original-title="A Title" data-container="body"
            data-content="And here's some amazing content.It's very engaging. right? And another thing about this is a that it's really long.  When I say  long I mean really, really long.  Super, duper long.  There is even more text that makes it longer.  Why do I need so much text in my modal?  It's so long that the top gets cut off by the modal header.  How do I fix this?">
            Terms and Agreement
         </a>
            
            <script>
              $('a[rel=popover]').popover();
            </script>

          </form>
      <div class="modal-footer">
            <label>
              <input type="checkbox" id="header_checkbox_agree"> I agree in the terms and agreement
            </label>

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" id="index_btn_register" disabled=true>Register</button>
      </div>
    </div>
  </div>
</div>





































<!-- Modal Login-->
<div class="modal fade" id="ModalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Enter your Email Address and Password</h4>
      </div>

      <div class="modal-body">

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label for="header_login_txt_email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control"  placeholder="Email" id="header_login_txt_email">
            </div>
          </div>
          <div class="form-group">
            <label for="header_login_txt_password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="header_login_txt_password" placeholder="Password">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
            <label>
                Not yet a member? <br /> Select close and Book Now to Register
            </label>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" id="header_login_btn_login">Log In</button>
      </div>
    </div>
  </div>
</div>

    
