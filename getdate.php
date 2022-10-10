<?php 

	if(isset($_REQUEST['pterms']))
	{
	
		$date=$_REQUEST['date'];
		$days=$_REQUEST['days'];


		echo date('Y-m-d', strtotime($date. ' +'.$days.' day'));
	}

?>