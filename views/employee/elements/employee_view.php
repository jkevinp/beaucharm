<?php

?>	
<div class="container">
	<section>
        <div class="row">
            <div class="jumbospace">
                <div class="col-md-10">
                	<div class="panel-group" id="accordion">
                    	<div class="panel panel-default">
                    		<div class="panel-heading">
                      			<h4 class="panel-title">
                        			<a data-toggle="collapse" data-parent="#accordion" href="#myaccount_collapseOne">Employee</a>
                      			</h4>
                    		</div>
                    		<div id="myaccount_collapseOne" class="panel-collapse collapse in">
                      			<div class="panel-body">
                        			<h4> Information</h4>
					                        <table class="table table-responsive table-hover">
					                            <thead>
					                                <tr>
					                                    <th>Field</th>
					                                    <th>Data</th>
					                                </tr>
					                            </thead>
					                            <tbody>
					                                <?php
                                                echo '<tr><td>EmployeeID</td> <td><input disabled id ="admin_edit_id" type="text" value="'.$this->d['emp'][0]['EmployeeID'].'"></td> </tr>';
                                                echo '<tr><td>Username</td> <td><input id ="admin_edit_username" type="text" value="'.$this->d['emp'][0]['Username'].'"></td></tr>';
                                                echo '<tr><td>Lastname</td> <td><input id ="admin_edit_lastname"type="text" value="'.$this->d['emp'][0]['LastName'].'"></td> </tr>';
                                                echo '<tr><td>Firstname </td> <td><input type="text" id ="admin_edit_firstname" style="" value="'.$this->d['emp'][0]['FirstName'].'"/></td> </tr>';
                                                echo '<tr><td>Birthdate </td> <td><input type="text" id ="admin_edit_birthdate" style="" value="'.$this->d['emp'][0]['Birthdate'].'"/></td> </tr>';
                                                echo '<tr><td>Gender</td>';
                                                echo '<td>';
                                                echo '<select  id ="admin_edit_gender" style="" >';
                                                echo '<option value="'.$this->d['emp'][0]['Gender'] .'">'.$this->d['emp'][0]['Gender'] .'</option>';
                                                if($this->d['emp'][0]['Gender'] === 'Male')
                                                {
                                                  echo '<option value="Female"> Female</option>';
                                                } else echo '<option value="Male"> Male</option>';
                                                echo '</select>';
                                                echo'<td></tr>';
                                                echo '<tr><td>Home Address</td> <td><input type="text" id ="admin_edit_address"value="'.$this->d['emp'][0]['HomeAddress'].'" style="height:100px"></td> </tr>';
                                                echo '<tr><td>Contact No</td> <td><input type="text" id ="admin_edit_contact"value="'.$this->d['emp'][0]['ContactNumber'].'"></td> </tr>';
                                                 echo '<tr><td>Civil Status</td>';
                                                echo '<td>';
                                                echo '<select  id ="admin_edit_civil" style="" >';
                                                echo '<option value="'.$this->d['emp'][0]['CivilStatus'] .'">'.$this->d['emp'][0]['CivilStatus'] .'</option>';
                                                if($this->d['emp'][0]['CivilStatus'] === 'Single')
                                                {
                                                  echo '<option value="Married"> Married</option>';
                                                } else echo '<option value="Single"> Single</option>';
                                                echo '</select>';
                                                echo '</td></tr>';
                                            ?>
                                        <tr> 
                                          
                                            <button type="button" class="btn btn-default" id="save">Save</button>
                                        
                                          <a href="<?php echo URL; ?>cpanel/employees/">
                                            <button type="button" class="btn btn-default" id="">Cancel</button>
                                          </a>
                                        </tr>
					                            </tbody>
					                        </table>
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
