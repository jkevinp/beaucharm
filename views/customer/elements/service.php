<?php 

	if(isset($_GET['name']))
	{
		echo "SERVICE NAME= ". $_GET['name'] ;
    }else die('Access denied');
?>

<!-- Index Page Content po -->
<div class="container">

            <section>
            <div class="row_services">  
            

            <div class="col-md-12 col_bg" style="background:white">
                <h1 class="hdr2">Service Information</h1>
                <table class="table table-responsive table-hover">
                 <?php
                    for ($r = 0; $r < count($this->d['service'][0]); $r++) 
                    {
                        if(key($this->d['service'][0]) != "ServicePriceID")
                        {
                            echo '<tr>';
                            echo '<td>';
                            echo key($this->d['service'][0]);
                            echo '</td>';
                            echo '<td>';
                            echo current($this->d['service'][0]);
                            echo '</td>';          
                        }
                        next($this->d['service'][0]);
                    }
                        echo '<tr>';
                        echo '<td>Description</td>';
                        echo '<td>'.$this->d['description'][0]['Description'].'</td>';
                        echo '</tr>';
                                              
                 ?>
                </table>
            </div>
            <!-- /.col-md-4 -->

           </div>
            </section>

