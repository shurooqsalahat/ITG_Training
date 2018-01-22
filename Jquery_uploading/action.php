<?php  
include('connect.php');
function GetImageExtension($imagetype)
    {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
 
     }
session_start();
$act  = isset($_GET["action"])?$_GET["action"]:"";
//echo $act;
$conn = connect_to_db(); 
		//header('location:Register.php');


if($act=='register'){
	
  $first = mysqli_real_escape_string($conn, $_POST['first']);
	
    $last =mysqli_real_escape_string($conn,$_POST["last"]); 
    $email =mysqli_real_escape_string($conn,  $_POST["email"]);	
    $password =mysqli_real_escape_string($conn,  $_POST["password"]);	
    $city =mysqli_real_escape_string($conn,$_POST["city"]); 
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		
		if (!empty($_FILES["uploadedimage"]["name"])) {
			

    $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);

    $imagename=date("d-m-Y")."-".time().$ext;

    $target_path = "uploads/".$imagename;


 
		if($num>0){
//echo "exist";
$_SESSION['message']="error";
}
		else{
			
			if(move_uploaded_file($temp_name, $target_path)) {
				$sql = "insert into users 
			(first,last,email,city,password , img_path) values (' ".$first."' , '".$last."' , '" .$email."','".$city."','".sha1($password).
			"' , '" .$target_path ."')"; 
		$result = mysqli_query($conn, $sql);
		$_SESSION['message']="done";
		}
				
			}
         
 
			
			
			
		header('location:Register.php');
		}
}

if($act=='login'){
	$email = $_POST["email"];	
    $password = $_POST["password"];	
	
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
						$sql = "select email , password from users 
			 where email= '" .$email."' ";
		$result = mysqli_query($conn, $sql);
		 while($row = $result->fetch_assoc()) {
       if($email==$row['email'] && sha1($password) ==$row['password']){
		   header('location: Register.php');
	   }
	   else{
		   $_SESSION['message']="wrong";
		    header('location: login.php');
	   }
    }
	
		}
		//header('location:Register.php');
//echo "exist";

		else{
         $_SESSION['message']="not_found";
		 echo "No result";
		  header('location: login.php');


}

}
if($act=='logout'){
		session_destroy();
		header('location: login.php');


}

?>