<?php 
    if(!isset($_GET['bid']) && !isset($_GET['cid']))
    {
        echo "<pre><center>";
        echo "<a href='myaccount'>My Account</a>";
        echo "<hr size=3 color=red>";
    if($this->d['info'] == null) die('Error Occured fetching booking data');
    }
?>
		<table  class="table table-responsive table-hover profile_table-design">
			<tr>
				<td>
					<img src="<?php echo IMAGES.'beaucharm.png';?>" width="150" height="150" border='1'>
				</td>
				<td align="left">
					Beaucharm Derma Salon
					<br/>Cora De Guzman
					<br/>(T)+63 2 8930872 / (M)+63 9432187693
					<br/>beaucharm_makati@yahoo.com
					<br/><img src="<?php echo IMAGES.'QRCODE.png';?>" border='1' align="right">
				</td>
			</tr>
	</table>
  <div class="col-md-12">
        	   <table class="table table-responsive table-hover profile_table-design">
                    <tr>
                    	
                    	<td>Customer Name: <?php echo $this->d['info'][0]['fname']." ".$this->d['info'][0]['lname'];?></td>
                    	<td>Booking ID#: <?php echo $this->d['info'][0]['BookingID'];?></td>
                    </tr>
                    <tr>
                    	<td>Assigned Crew :<?php echo $this->d['info'][0]['efname']." ".$this->d['info'][0]['elname'];?></td></td>
                    	<td>Customer ID#: <?php echo $this->d['info'][0]['CustomerID'];?></td>
                    </tr>
                    <tr>
                    	<td>Appointment Date: <?php echo $this->d['info'][0]['AppointmentDate'];?></td></td>
                    	<td>Date Booked: <?php echo $this->d['info'][0]['DateBooked'];?></td>
                    </tr>
                </table>

        	<h5 class="hdr3" align="center">My Appointments</h5>
                <table class="table table-responsive table-hover profile_table-design">
                            <thead>
                                
                                <tr>
                                    <th>Service Name</th>
                                    <th>Assigned Crew</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                    $price = 0;
                                    foreach ($this->d['info'] as $key => $d) 
                                    {
                                            echo '<tr>';
                                            echo '<td>'.$d['ServiceName'].'</td>';
                                            echo '<td>'.$d['efname'].' '.$d['elname'].'</td>';
                                            echo '<td>'.$d['from'].'</td>';
                                            echo '<td>'.$d['to'].'</td>';
                                            echo '<td>'.$d['ServiceFee'].'</td>';
                                            echo '</tr>';
                                            $price += $d['ServiceFee'];
                                    }
                                    Echo '<tr><td colspan=4><p align=right>Total:</td><td> '.$price.'.00</td></tr>';
                                ?>

                            </tbody>
                </table>
     </div>