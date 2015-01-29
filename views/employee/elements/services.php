<?php
  $limit = RESULT_LIMIT;
  
?>
  <div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
          <h2>Services</h2>

          <div class="row rowspace">
              <div class="col-lg-12 col-sm-12">     
                <div class="col12_layout">
                  <div class="well">
                       
                       <button class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalAddServices">
                          Add a Service
                       </button>
                        <button class="btn btn-default pull-right" id="new_price" >
                          Create New Price
                       </button>
                       <button class="btn btn-default pull-right" id="new_category">
                          Create New Category
                       </button>
                       <form class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Service</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search Service">
                        </div>
                        </form>

                          <br/><br/>
                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Service ID</th>
                                  <th>Service Name</th>
                                  <th>Category</th>
                                  <th>Description</th>
                                  <th>Price</th>
                                  <th>Duration</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              
                            <?php 
                              
                              foreach ($this->d['services'] as $v) 
                              {
                                echo '<tr>';
                                echo '<td>'.$v['ServiceID'].'</td>';
                                echo '<td>'.$v['ServiceName'].'</td>';
                                echo '<td>'.$v['categoryname'].'</td>';
                                echo '<td>'.$v['Description'].'</td>';
                                echo '<td>'.$v['ServiceFee'].'</td>';
                                echo '<td>'.$v['Duration'].'</td>';
                                
                                echo '<td><a href="'.URL.'cpanel/service_edit/@serviceid='.$v['ServiceID'].'"><button type="button" class="btn btn-primary btn-xs">Edit</button>';
                                 if($v['serviceStatus'] === '1' ||$v['serviceStatus'] === 1 )
                                    {
                                      echo '<a href="'.URL.'cpanel/service_edit_status/@serviceid='.$v['ServiceID'].'@status=0"><button type="button" class="btn btn-primary btn-xs">Deactivate</button></a>';
                                    
                                    }else{
                                      echo ' <a href="'.URL.'cpanel/service_edit_status/@serviceid='.$v['ServiceID'].'@status=1"><button type="button" class="btn btn-primary btn-xs">Activate</button></a>';
                                    
                                    }
                                echo '</td>';
                                echo '</tr>';
                              }
                             
                             ?>
                          </tbody>
                      </table>
                      <ul class="pagination">
                          <?php 
                          $total = (int)($this->d['count'][0]['count(*)']);
                          $page = floor($total / $limit);
                          $url = isset($_GET['url']) ? $_GET['url'] : null;
                          $actual_link = "http://$_SERVER[HTTP_HOST]/".APP_NAME.'/'.$url;
                          $v = explode('@', $actual_link);
                         
                          for($x = 0; $x < ($total / $limit); $x++)
                          {
                                echo ' <li><a href="'.$v[0].'@page='.$x.'">'.($x +1).'</a></li>';
                          }
                        ?>
                      </ul>
                  </div>
                </div>
              </div>
          </div>

<!--Add Service Modal-->
<div class="modal fade" id="ModalAddServices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a Service</h4>
      </div>


      <div class="modal-body">
        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            
            <input type="email" class="form-control" id="service_name" placeholder="Service Name">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <select id="service_category">
              <option value="-1">Select Category:</option>
              <?php
              foreach ($this->d['categories'] as $v) 
              {
                  echo '<option value="'.$v['categoryid'].'">'.$v['categoryname'].'</option>';
              }
              ?>
             </select> 
           </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group formAlign2">
            <textarea class="form-control" rows="3" id="desc" placeholder="Description"></textarea>
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <div class="form-group">
            <select id="service_price">
                <option value="-1">Select Service Fee</option>
                <?php
                   foreach ($this->d['prices'] as $v) 
              {
                
                  echo '<option value="'.$v['ServicePriceID'].'">'.$v['ServiceFee'].'</option>';
              }
              ?>
             </select>
             </div>
        </form>

         <form class="form-inline text-center form_space" role="form">
          <div class="form-group formAlign2">
            <label class="sr-only" for="exampleInputEmail2">Duration</label>
            <input type="email" class="form-control" id="service_duration" placeholder="Duration[Minutes]">
          
          </div>
        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Revert</button>
        <button type="button" class="btn btn-default" id="service_add_btn">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<!--Edit Service Modal-->
<div class="modal fade" id="ModalEditServices" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit a Service</h4>
      </div>


      <div class="modal-body">
        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Service Name</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Service Name">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <select>
              <option value="category">Service Category</option>
              <option value="category">Facial Sensation</option>
             </select>
             <input type="email" class="form-control" id="exampleInputEmail2" placeholder="new service category">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group formAlign2">
            <textarea class="form-control" rows="3" placeholder="Description"></textarea>
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Price</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Price">
          </div>

          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Duration</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Duration">
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

      </div>
  </div>
</div><!--/row-offcanvas -->
  
  
</body>
</html>