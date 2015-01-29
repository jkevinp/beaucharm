<?php 

	if(isset($_GET['q']))
	{
	    echo '<br/><br/><center><pre style="width:80%";margin-left:auto;margin-right:auto;>';
        echo 'You searched for <a>'.$_GET['q'].'</a>';
        echo '</pre>';

        echo '<br/><br/><pre style="width:80%";margin-left:auto;margin-right:auto;>';
        echo 'Search Results.';
        echo '<h3> By Name</h3>';
        if(is_array($this->d['name']))
        {   
            echo '<table border=0 align="center" style="padding-left:10px;">';
            echo count($this->d['name'])." result/s found.<br/>";
            foreach ($this->d['name'] as $value) 
            {
                echo '<tr><td><a href="'.URL.'service?name='.$value['ServiceID'].'">'.$value['ServiceName'].'</a></td></tr>';
            }
            echo '</table>';
        }
        else echo 'No results found!';
        echo '<h3> By Description</h3>';
        if(is_array($this->d['description']))
        { 
               echo '<table border=0 align="center" style="padding-left:10px;">';
            echo count($this->d['description'])." result/s found.<br/>";
            foreach ($this->d['description'] as $value) 
            {
                echo '<tr><td><a href="'.URL.'service?name='.$value['ServiceID'].'">'.$value['ServiceName'].'</a></td></tr>';
            }
              echo '</table>';
            
        }else echo 'No results found!';
        echo '</pre>';
    }
    else{
         echo '<br/><br/><pre>';
         echo 'something went wrong..';
        echo '<a href="index">Back to Home</a>';
        echo '</pre></center>';
    }
    


?>

