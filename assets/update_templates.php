		<?php
		include 'config.php';
		session_start();






				
		  echo $query='SELECT * from invoice_design where uid='.$_REQUEST['id'];
		$sql=mysqli_query($con,$query);
		$count= mysqli_num_rows($sql);


		if($count<1)
		{
			if($_REQUEST['input']=='header')
			{
				$query='insert  into invoice_design(header,uid) VALUES("'.$_REQUEST['value'].'","'.$_REQUEST['id'].'") ';


			}
			if($_REQUEST['input']=='color')
			{
				echo 	$query='insert  into invoice_design(color,uid) VALUES("'.$_REQUEST['value'].'","'.$_REQUEST['id'].'") ';
			}
		}
		else
		{
			
			if($_REQUEST['input']=='header')
			{
				 $query='update invoice_design set header="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];


			}
			if($_REQUEST['input']=='color')
			{
				 		 $query='update invoice_design set color="'.$_REQUEST['value'].'" where uid='.$_REQUEST['id'];
			}
		}

		$sql=mysqli_query($con,$query);
		if($sql)
		{
			echo 'Updated';
		}


		 		   	
		?>

