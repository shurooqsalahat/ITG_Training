<?php 
include('connect.php');
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


if (!empty($_FILES["uploadedimage"]["name"])) {

    $file_name=$_FILES["uploadedimage"]["name"];

    $temp_name=$_FILES["uploadedimage"]["tmp_name"];

    $imgtype=$_FILES["uploadedimage"]["type"];

    $ext= GetImageExtension($imgtype);

    $imagename=date("d-m-Y")."-".time().$ext;

    $target_path = "uploads/".$imagename;

if(move_uploaded_file($temp_name, $target_path)) {
 
  $sql = "insert into users 
			(first,last,email,city,password , img_path) values (' laila', 'salahat ' , 'nesreen@gmail.com' ,'Nablus' , '12345678' ,'" . $target_path."')"; 
		
  $result = mysqli_query($conn, $sql)or die("error in $query_upload == ----> ".mysql_error()); 

}else{

   exit("Error While uploading image on the server");
}

}

?> 
