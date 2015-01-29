<?php
  echo '<input id="chart_1_data" type="hidden" value="'.count($this->d['count']).'"/>';
  echo '<input id="chart_1_data_least" type="hidden" value="'.count($this->d['least']).'"/>';
    $ctr = 1;
    foreach ($this->d['count'] as $key => $value) 
    {
      echo '<input id="chart_1_data_label_'.$ctr.'" type="hidden" value="'.$value['name'].'"/>';
      echo '<input id="chart_1_data_value_'.$ctr.'" type="hidden" value="'.$value['size'].'"/>';
    $ctr ++;
    }

    $ctr =1 ;

    foreach ($this->d['least'] as $key => $value) 
    {
      echo '<input id="chart_2_data_label_'.$ctr.'" type="hidden" value="'.$value['name'].'"/>';
      echo '<input id="chart_2_data_value_'.$ctr.'" type="hidden" value="'.$value['size'].'"/>';
    $ctr ++;
    }

?>

<div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          <h2>Dashboard</h2>
          <div class="row rowspace">
            <div class="col-lg-4 col-sm-4">
              <div class="col12_layout">
                <div class="well">
                  <h3>All Time<br />Most availed services</h3>
                  <canvas id="chart_pie_mostAvailed" width="280" height="280"></canvas>
                  <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Service Name</th>
                                  <th>Number of <br /> Customers Availed</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                  foreach ($this->d['count'] as $key => $value) 
                                  {
                                    echo '<tr>';
                                    echo '<td>'. $value['name'].'</td>';
                                    echo '<td>'. $value['size'].'</td>';
                                    echo '</tr>';
                                  }
                              ?>
                          </tbody>
                      </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-4">
              <div class="col12_layout">
                <div class="well">
                  <h3> All Time<br />Least availed services</h3>
                     <canvas id="chart_pie_leastAvailed" width="280" height="280"></canvas>
                  <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Service Name</th>
                                  <th>Number of <br /> Customers Availed</th>
                              </tr>
                          </thead>
                          <tbody>
                               <?php
                                  foreach ($this->d['least'] as $key => $value) 
                                  {
                                    echo '<tr>';
                                    echo '<td>'. $value['name'].'</td>';
                                    echo '<td>'. $value['size'].'</td>';
                                    echo '</tr>';
                                  }
                              ?>
                          </tbody>
                      </table>
                </div>
              </div>
            </div>

           

          </div>
      </div>
       <div class="col-lg-12 col-sm-12">
              <div class="col12_layout">
                <div class="well update_list">
                  <div class="update_space">
                    <h3>Monthly service update - Availed<br/><br/><br/></h3>
                    <canvas id="chart_bar" height="150" width="930"></canvas>
                 <h3>Monthly service update - Cancelled<br/><br/><br/></h3>
                    <canvas id="chart_bar1" height="150" width="930"></canvas>
                 <h3>Monthly service update - Reserved<br/><br/><br/></h3>
                    <canvas id="chart_bar2" height="150" width="930"></canvas>
                 <h3>Monthly service update - On transaction<br/><br/><br/></h3>
                    <canvas id="chart_bar3" height="150" width="930"></canvas>
                 </div>
                </div>
              </div>
            </div>
  </div>
</div><!--/row-offcanvas -->
  
  
</body>
</html>