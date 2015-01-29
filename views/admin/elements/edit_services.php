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
                                                echo '<tr><td>Service ID</td> <td><input disabled id ="admin_edit_id" type="text" value="'.$this->d['service'][0]['ServiceID'].'"></td> </tr>';
                                                echo '<tr><td>Service Price ID </td><td>';
                                                echo '<select id="admin_edit_price">';
                                                echo '<option value="'.$this->d['service'][0]['ServicePriceID'].'">'.$this->d['service'][0]['ServiceFee'].' </option>';
                                                foreach ($this->d['prices'] as $value) {
                                                    echo '<option value="'.$value['ServicePriceID'].'">'.$value['ServiceFee'].' </option>';
                                               
                                                }

                                                echo '</select>';
                                                echo '</td></tr>';
                                                
                                                echo '<tr><td>Service Name</td> <td><input id ="admin_edit_name"type="text" value="'.$this->d['service'][0]['ServiceName'].'"></td> </tr>';
                                                echo '<tr><td> Category </td><td>';

                                                echo '<select id="admin_edit_category">';
                                                echo '<option value="'.$this->d['service'][0]['Category'].'">'.$this->d['service'][0]['Category'].' </option>';
                                                foreach ($this->d['categories'] as $value) {
                                                    echo '<option value="'.$value['categoryname'].'">'.$value['categoryname'].' </option>';
                                                
                                                }
                                                $time = $this->d['service'][0]['Duration'];
                                                list($h, $m, $s) = explode(':', $time);
                                                $t = ($h * 60) + ($m) + $s; 
                                                echo '</select>';
                                                echo '</td></tr>';
                                                echo '<tr><td>Duration[By Minutes] </td> <td><input type="text" id ="admin_edit_duration" style="" value="'.$t.'"/></td> </tr>';
                                              
                                               
                                            ?>
                                        <tr> 
                                          
                                            <button type="button" class="btn btn-default" id="save">Save</button>
                                        
                                          <a href="<?php echo URL; ?>cpanel/services/">
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
