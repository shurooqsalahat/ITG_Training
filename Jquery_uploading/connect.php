<?php function connect_to_db(){
		$db_user = "root";
		$db_server = "localhost";
		$db_name = "train_itg";
		$db_password = "";
		
		$conn = mysqli_connect($db_server,$db_user,$db_password, $db_name);
		if(!$conn){
				echo mysqli_connect_error();
		}
		else{
		//	echo "connect";
		}
		return $conn;
	}
	
 ?>