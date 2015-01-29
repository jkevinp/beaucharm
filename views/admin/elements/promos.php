<div id="main">
      <div class="col-md-12">
          <p class="visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
          </p>
          
          <h2>Promos</h2>

          <div class="row rowspace">
              <div class="col-lg-12 col-sm-12">     
                <div class="col12_layout">
                  <div class="well">
                       
                       <button class="btn btn-default pull-right" data-toggle="modal" data-target="#ModalAddPromo">
                          Add a Promo
                       </button>
 
                       <form class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Promo</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search Promo">
                        </div>
                        </form>
                        <br/><br/>


                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Promo ID</th>
                                  <th>Name</th>
                                  <th>Code</th>
                                  <th>Mechanics</th>
                                  <th>Price</th>
                                  <th colspan =2>Actions</th>
                                  <th>&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                                foreach ($this->d['promos'] as $v) 
                                {

                                  echo '<tr>';
                                    echo '<td>';
                                      echo $v['promoID'];
                                    echo '</td>';
                                    echo '<td>';
                                      echo $v['promoName'];
                                    echo '</td>';
                                     echo '<td>';
                                        echo $v['couponID'];
                                    echo '</td>';
                                     echo '<td>';
                                      echo $v['mechanics'];
                                    echo '</td>';
                                     echo '<td>';
                                     echo $v['ServiceName'];
                                    echo '</td>';
                                    echo '<td>';
                           
                              if($v['Status'] === '1' ||$v['Status'] === 1 )
                                    {
                                      echo '<a href="'.URL.'cpanel/promo_edit_status/@promoid='.$v['promoID'].'@status=0"><button type="button" class="btn btn-primary btn-xs">Deactivate</button></a>';
                                    
                                    }else{
                                      echo ' <a href="'.URL.'cpanel/promo_edit_status/@promoid='.$v['promoID'].'@status=1"><button type="button" class="btn btn-primary btn-xs">Activate</button></a>';
                                    
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
                          $page = floor($total / RESULT_LIMIT);
                          $url = isset($_GET['url']) ? $_GET['url'] : null;
                          $actual_link = "http://$_SERVER[HTTP_HOST]/".APP_NAME.'/'.$url;
                          $v = explode('@', $actual_link);
                          
                          for($x = 0; $x < ($total / RESULT_LIMIT); $x++)
                          {
                                echo ' <li><a href="'.$v[0].'@page='.$x.'">'.($x +1).'</a></li>';
                          }
                        ?>
                      </ul>
                  </div>
                </div>
              </div>
          </div>

<!--Add Promo Modal-->
<div class="modal fade" id="ModalAddPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a Promo</h4>
      </div>

  
      <div class="modal-body">
        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Promo Name</label>
            <input type="email" class="form-control" id="promo_name" placeholder="Promo Name">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Coupon Code</label>
            <input type="email" class="form-control" id="promo_code" placeholder="Coupon Code">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group formAlign2">
            <textarea class="form-control" rows="3" placeholder="Mechanincs" id="promo_mechanics"></textarea>
          </div>
        </form>

      

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <select id="promo_service">
                <?php
                  foreach ($this->d['services'] as $v) 
                  {
                    echo '<option value="'.$v['ServiceID'].'">'.$v['ServiceName'].'</option>';
                  }

                ?>
            </select>
          </div>
        </form>
    </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-default" id="promo_add">Save Changes</button>
      </div>
    </div>
  </div>
</div>


<!--Edit Promo Modal-->
<div class="modal fade" id="ModalEditPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add a Promo</h4>
      </div>


      <div class="modal-body">
        <form class="form-inline text-center form_space" role="form">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail2">Promo Name</label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Promo Name">
          </div>
        </form>

        <form class="form-inline text-center form_space" role="form">
          <div class="form-group formAlign2">
            <textarea class="form-control" rows="3" placeholder="Mechanincs"></textarea>
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