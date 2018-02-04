<?php  
include('connect.php');
session_start();
$act  = isset($_GET["action"])?$_GET["action"]:"";

$conn = connect_to_db(); 
		

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
	 
	  if($act=='logout'){
		  session_unset();
		  header('location:login.php');

		 
		  }
		  
		  
		  
	 if($act=='deletepost'){
	//echo 'indelete post';
	$post=$_GET["id"];
	//echo $post; 
	$sql = "DELETE FROM posts WHERE id=".$post;
    
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    $sq2 = "DELETE FROM comments WHERE post_id=".$post;
    mysqli_query($conn, $sq2);
	header('location:index.php');
	
} else {
    echo "Error deleting record: " . mysqli_error($conn);
	header('location:index.php');
}
}
	 if($act=='deletecomment'){
	//echo 'in delete comment';
	$comm=$_GET["id"]; 
	//echo $comm;
	$sql = "DELETE FROM comments WHERE id=".$comm;

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
	header('location:index.php');
	
} else {
    echo "Error deleting record: " . mysqli_error($conn);
	header('location:index.php');
}
	
}
if($act=='register'){
	$name= $_POST["full-name"]; 
 $email = $_POST["email"];	
    $password = $_POST["password"];	
    $city = $_POST["city"]; 
	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
			
        $_SESSION['message']="error";
           }
		else{
			$sql = "insert into users 
			(fullname,email,password,city) values (' ".$name."' , '" .$email."','".sha1($password)."','".$city."')"; 
		$result = mysqli_query($conn, $sql);
		$_SESSION['message']="done";
		
		}
		header('location:register.php');

}

if($act=='login'){
	  $_SESSION['email'] =$email = $_POST["email"];	
    $password = $_POST["password"];

	$sql ="select email from users where email= '" .$email."'";
	$result = mysqli_query($conn , $sql);
		$num =  mysqli_num_rows($result);
		if($num>0){
						$sql = "select email , password from users 
			 where email= '" .$email."' ";
		$result = mysqli_query($conn, $sql);
		 while($row = $result->fetch_assoc()) {
       if($email==$row['email'] && sha1($password )==$row['password']){
		   header('location: index.php');
	   }
	   
	   else{
		   $_SESSION['message']="error";
		    header('location: login.php');
	   }
    }
		
				}
		else{
         $_SESSION['message']="not_found";
		  header('location: login.php');
}

}

if($act=='post'){
	echo $_SESSION['email'];
$sub= $_POST["tiney"]; 
 if (!empty($_FILES["uploadedimage"]["name"])) {
			

    $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);

    $imagename=date("d-m-Y")."-".time().$ext;

 $target_path = "uploads/".$imagename;
 move_uploaded_file($temp_name, $target_path);
 }
	else{
		$target_path = "no image";
	}
$sql = "insert into posts 
			(email,content,img_path) values (' ". $_SESSION['email']."' ,'".$sub."', '" .$target_path."')"; 
		$result = mysqli_query($conn, $sql);
		

header('location:index.php');
}

if($act=='comment'){
	
	
	$id= $_POST["butt"];
	$inp = $_POST[ $id ];
	$sql = "insert into comments 
			(post_id,content,email) values (' ". $id."' , '" .$inp."','".$_SESSION['email']."')"; 
	$result = mysqli_query($conn, $sql);
	
		
		
header('location:index.php');
}


?>