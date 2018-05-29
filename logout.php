<?php
	session_start();
 	session_destroy();
	header('location: http://localhost/deceptive-polymath/DPapp/');
	echo "session destroyed";	
?>
