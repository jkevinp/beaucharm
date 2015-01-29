<?php
	if(session_id()==='')session_start();
	session_destroy();
	echo '<script> document.location="'.URL.'"</script>';
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<h2>
	<center><p style='background:white'><br/><br/>Logging out.<br/><a href='<?php echo URL;?>index'>Go to Home</a><br/><br/><br/></p></center>
</h2>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>