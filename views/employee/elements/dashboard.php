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

            <div class="col-lg-4 col-sm-4">
              <div class="col12_layout">
                <div class="well update_list">
                  <div class="update_space">
                    <h3>Monthly service update<br/><br/><br/></h3>
                    <table class="table table-responsive table-hover">
                          <tr> 
                            <td>Total services availed</td>
                            <td><?php echo $this->d['availed']['0']['count(*)'];?></td>
                          </tr>
                          <tr> 
                            <td>Total services availed</td>
                            <td><?php echo $this->d['availed']['0']['count(*)'];?></td>
                          </tr>
                          <tr> 
                            <td>Total services cancelled</td>
                            <td><?php echo $this->d['cancelled']['0']['count(*)'];?></td>
                          </tr>
                          <tr> 
                            <td>Total services on reserved</td>
                            <td><?php echo $this->d['onqueue']['0']['count(*)'];?></td>
                          </tr>
                           <tr> 
                            <td>Total services on tansaction</td>
                            <td><?php echo $this->d['ontransaction']['0']['count(*)'];?></td>
                          </tr>
                          <tr>
                              <td>This month's profit</td>
                              <td> Php 
                                    <?php 
                                    $profit = 0;
                                    foreach ($this->d['profit'] as $key => $value)
                                    {
                                      $profit += (int)$value['ServiceFee'];
                                    }
                                    echo $profit;
                                    ?>
                              </td>
                          </tr>

                    </table>
                   
                      
                 </div>
                </div>
              </div>
            </div>

          </div>
      </div>
  </div>
</div><!--/row-offcanvas -->
  
  
</body>
</html>