
<?php
  echo '<input type="hidden" value="'.$this->d['count'][0]['count(*)'].'" id="help_count">';
?>
  <div class="row rowspace">
              <div class="col-lg-10 col-sm-10">     
                <div class="col12_layout">
                  <div class="well">
                  <h4>Help and Support</h4>
                       <form class="form-inline pull-right" role="form">
                        <div class="form-group">
                          <label class="sr-only" for="Search">Search Message</label>
                          <input type="email" class="form-control" id="Search" placeholder="Search Message">
                        </div>
                        </form>


                        <table class="table table-responsive table-hover">
                          <thead>
                              <tr>
                                  <th>Sender</th>
                                  <th>Title</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            
                             <?php
                              $ctr =0;
                               foreach ($this->d['messages'] as $key => $value) 
                                {
                                    echo '<tr>';
                                    echo '<td>'.$value['FirstName'].' '.$value['LastName'].'</td>';
                                    echo '<td>'.$value['MessageTitle'].'</td>';
                                     echo '<td>
                                    <input  class="btn btn-primary btn-xs" type="button" id="txtmessage_'.$ctr.'" value="Read" name="'.$value['MessageContent'].'" />
                                    <a href="'.URL.'cpanel/message_delete/@messageid='.$value['MessageID'].'">
                                    <button type="button" class="btn btn-primary btn-xs">Delete</button></a>
                                    
                                    <button id="m_'.$ctr.'" type="button"  data-toggle="modal" data-target="#modalreply" class="btn btn-primary btn-xs" name="'.$value['CustomerID'].'">Reply</button>';

                                   
                                echo '</td>';
                                echo '</tr>';
                                $ctr++;
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

    <div class="modal fade" id="modalreply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">System Help</h4>
      </div>

      <div class="modal-body">
        <p>Reply to Customer</p>
        <form class="form-horizontal" role="form">
          <div class="form-group">
            <div class="col-sm-10">
              <input type="text" class="form-control" id="help_send_title" placeholder="Title">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10">
              <textarea class="form-control" id="help_send_content" placeholder="Content"></textarea>
            </div>
        </form>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default"  id="help_send_help">Send</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>