<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Beaucharm Derma Salon</title>
    
    <!-- link po kay bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- extracted and custom css ko po galing kay bootstrap -->
    <link href="css/customer.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">

     <!-- jQuery Version 1.11.0 -->
    <script src="js/jqueryPlugin.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.js"></script>
    <script src="<?php echo URL;?>public/js/lheader.js"></script>

</head>
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
                <a class="navbar-brand" href="<?php echo URL;?>">

                    <div>
                        <img src="<?php echo IMAGES.'beaucharm-logo.png';?>" width="100" height="100" border='1'>
                  
                  </div>
                </a>
                  <a class="navbar-brand" href="<?php echo URL;?>"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beaucharm Derma Salon</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <li><input type="text" placeholder="Search Services" id="lheader_livesearch"/></li>
                <li><a href="#"  data-toggle="modal" data-target="#ModalFaqs">FAQs</a></li>
                <li><a href="#" data-toggle="modal" data-target="#ModalHelp" id="">Help</a></li>
                
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['username']; ?><span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo URL."myaccount";?>">My Account</a></li>
                
                  <li><a href="#" data-toggle="modal" data-target="#ModalMessage" id="myaccount_btn_getMessages">My Messages</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#ModalUpdateAcc" id="myaccount_btn_getInfo">My Profile</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#ModalChangePass">Change Password</a></li>
                  <li class="divider"></li>
                   <li><a href="<?php echo URL."directions";?>">Utility</a></li>
                  <li class="divider"></li>
                  
                  <li><a href="logout">Log Out</a></li>
                </ul>
              </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Modal Update Account -->
<div class="modal fade" id="ModalUpdateAcc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Update Profile</h4>
      </div>


      <div class="modal-body">
        <p>Change your profile information</p>
      <form class="form-inline text-center" role="form">
          <div class="form-group">
            <label class="sr-only" for="myaccount_txt_email">Email address</label>
            <input type="email" class="form-control" id="myaccount_txt_email" placeholder="Enter email">
          </div>
        </form>
        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="myaccount_txt_lastname">Last Name</label>
            <input type="email" class="form-control" id="myaccount_txt_lastname" placeholder="Last Name">
          </div>

          <div class="form-group">
            <label class="sr-only" for="myaccount_txt_firstname">First Name</label>
            <input type="email" class="form-control" id="myaccount_txt_firstname" placeholder="First Name">
          </div>
        </form>

        <form class="form-inline text-center formSpace" role="form">
            <div class="form-group">
            <label class="sr-only" for="myaccount_txt_birthday">Birthdate</label>
            <input type="email" class="form-control date"  placeholder="Birthdate" id="myaccount_txt_birthday">
          </div>

          <div class="form-group">
            <select class="form-control formAlign" id="myaccount_select_gender">
              <option>Male</option>
              <option>Female</option>
            </select>
          </div>
        </form>
        
        <form class="form-inline text-center formSpace" role="form">
            <div class="form-group formAlign2">
            <textarea class="form-control" rows="2" placeholder="Home Address" id="myaccount_txt_homeaddress"></textarea>
          </div>

          <div class="form-group">
            <textarea class="form-control" rows="2" placeholder="Business Address" id="myaccount_txt_businessaddress"></textarea>
          </div>
        </form>
        
        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="myaccount_txt_contactnumber">Contact Number</label>
            <input type="email" class="form-control" id="myaccount_txt_contactnumber" placeholder="Contact Number">
          </div>

          <div class="form-group">
            <label class="sr-only" for="myaccount_txt_firstname">Business</label>
            <input type="email" class="form-control" id="myaccount_txt_bcontactnumber" placeholder="Business Contact Number">
          </div>
        </form>

        <form class="form-inline text-center formSpace" role="form">
        <div class="form-group">
            <label class="sr-only" for="myaccount_txt_occupation">Occupation</label>
            <input type="email" class="form-control" id="myaccount_txt_occupation" placeholder="Occupation">
          </div>

          <div class="form-group">
            <select class="form-control formAlign" id="myaccount_select_civilstatus">
              <option>Single</option>
              <option>Married</option>
            </select>
          </div>
        </form>
    </div>

      <div class="modal-footer">
            <label>
              <input type="checkbox" id="myaccount_checkbox_agree"> 
              Save The Following Changes
            </label>
        <button type="button" class="btn btn-default" data-dismiss="modal">Revert</button>
        <button type="button" class="btn btn-default" id="myaccount_btn_save" disabled=true>Save Changes</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal Messages -->
<div class="modal fade" id="ModalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">My Messages</h4>
      </div>
        <section>
            <div class="row">
                    <!-- Carousel section -->
                  <div class="jumbospace">
                   <div class="col-md-12">
                    
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneMessage">Inbox</a>
                          </h4>
                        </div>
                        <div id="collapseOneMessage" class="panel-collapse collapse in">
                          <div class="panel-body">
                               <table class="table table-responsive table-hover">
                                  <tbody id="lheader_tbody_message">
                                      
                                  </tbody>
                              </table>
                          </div>
                        </div>


                        <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwoMessage">
                              Sent Messages
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwoMessage" class="panel-collapse collapse">
                          <div class="panel-body">
                            
                            <table class="table table-responsive table-hover">
                                  <tbody id="lheader_tbody_sent_message">
                                      
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        </div>
                        </div>
                    </div>
                   </div>
                <!-- End of Carousel Section-->
                

        </section>

      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







<!-- Modal Change Password-->
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
    <script src="js/jquery-ui.js"></script>
    <script src="js/ui.js"></script>


    <!-- Modal Change Password-->
<div class="modal fade" id="ModalFaqs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Frequently Asked Questions</h4>
      </div>

      <div class="modal-body">
        <!-- ACCORDION START !-->
        <section>
        <div class="row">
                <!-- Carousel section -->
              <div class="jumbospace">
               <div class="col-md-12">
                
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> How do I make a reservation? </a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                      <div class="panel-body">
                        Reservations can be made by using the Book Appointment form at <a href="<?php echo URL."myaccount";?>">My Account- Book Appointment</a>
                        First, select what service you want to avail for the said Appointment then select the employee who you want to serve you.
                        Since we can't be sure if that employee is available during the day of appointment you selected, the system will generate a list of schedule of free slot that the employee can take up your reservation.
                        Every service only takes up three(2) reservation to avoid conflict. The Last part will be the confirmation and the checkout. 
                      </div>
                    </div>


                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                          What to do with my reservation?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                      <div class="panel-body">
                        Every reservation has its own reference number or id.
                        You can list down the reference number or print out the appointment form provided to you
                        at the end of booking. All you have to do is to show your appointment form or present
                        the reference number of your appointment in our salon.
                      </div>
                    </div>
                    </div>

                    <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                          How to cancel my reservation?
                        </a>
                      </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                      <div class="panel-body">
                        You can cancel a reservation at <a href="#">My Account- Cancel Appointment</a>
                      </div>
                    </div>
                    </div>
                </div>
               </div>
            <!-- End of Carousel Section-->
            

    </section>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



    <!-- Modal Help-->
<div class="modal fade" id="ModalHelp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">System Help</h4>
      </div>

      <div class="modal-body">
        <p>Send Message To Administrator</p>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <div class="col-sm-10">
              <input type="text" class="form-control" id="header_send_title" placeholder="Title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <textarea class="form-control" id="header_send_content" placeholder="Content"></textarea>
            </div>
        </form>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  id="header_send_help">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



