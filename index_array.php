<?php
echo'*******Indexed array*******'; 
echo'<br>';

echo 'Students array is :';
$Students = array("Ahmad", "Ali" , "Mohammad");

$Subjects = array("Math", "Physics" , "Arabic" , "English");
for($i=0; $i<count($Students) ; $i++){
	echo'<br>';
	echo $Students[$i];
}
echo'<br>';

echo 'Sujects  array is :';
for($i=0; $i<count($Subjects) ; $i++){
	echo'<br>';
	echo $Subjects[$i];
}
echo'<br>';

echo'<br>';
echo'<br>'; 
echo'*******Multidyminsional array*******';
echo'<br>';

$mul = array( array( 'Name' => "Ahmad",
                       'Physics' =>84, 
                       'Math' => 65,
                       'Arabic' => 90,
					   'English' => 75
                    ),
               array( 'Name' => 'Ali',
                       'Physics' =>72, 
                       'Math' => 67,
                       'Arabic' => 89,
					   'English' => 54
                    ),
               array( 'Name' => 'Mohammad',
                       'Physics' =>55, 
                       'Math' => 67,
                       'Arabic' =>93,
					   'English' => 80 
                    )
             );
			 echo 'Array Before modification : '; echo '<br>'; 
			for($i=0 ; $i<count($mul);$i++){
				 echo $mul[$i]['Name'] ;echo " : \t   ";
				echo "Physics : "; echo  $mul[$i]['Physics'];echo ",  \t   ";
				echo "Math : "; echo  $mul[$i]['Math'];echo ",  \t   ";
				echo "Arabic : "; echo  $mul[$i]['Arabic'];echo ",  \t   ";
				echo "English : "; echo  $mul[$i]['English'];echo ",  \t   ";
				echo '<br>';
			} 
//echo count($mul);
$arr = array(); 
for($i=0 ; $i<count($mul);$i++){
	
	if($mul[$i]['Name']=="Mohammad"){
		$i++; 
		if($i==count($mul)){
		break;}

	}
	else {$mul[$i]['Physics'] +=2; }
}
for($i=0 ; $i<count($mul);$i++){
	if($mul[$i]['Physics'] <= 60  ){
		array_push($arr , $mul[$i]['Physics']); 	
	}
	
	if($mul[$i]['Math'] <= 60  ){
		array_push($arr , $mul[$i]['Math']); 	
	}
	
	if($mul[$i]['Arabic'] <= 60  ){
		array_push($arr , $mul[$i]['Arabic']); 	
	}
	if($mul[$i]['English'] <= 60  ){
		array_push($arr , $mul[$i]['English']); 	
	}
	
	}
		 echo 'Array After modification : '; echo '<br>'; 
	for($i=0 ; $i<count($mul);$i++){
				 echo $mul[$i]['Name'] ;echo " : \t   ";
				echo "Physics : "; echo  $mul[$i]['Physics'];echo ",  \t   ";
				echo "Math : "; echo  $mul[$i]['Math'];echo ",  \t   ";
				echo "Arabic : "; echo  $mul[$i]['Arabic'];echo ",  \t   ";
				echo "English : "; echo  $mul[$i]['English'];echo ",  \t   ";
				echo '<br>';
			} 
	//echo $mul[0]['Physics'];
	echo'<br>'; echo "Array is :  ";
   print_r($arr); 
	echo'<br>'; echo "Length is :  "; echo count($arr); 
	
	echo'<br>';echo'<br>';
	echo'*******Part 3 *******';
	echo'<br>';
	$test = array(1,3,5,7,9,11,13,4, 2, 8); 
	echo 'array is : ';print_r($test); 
	echo'<br>';
	 echo "using for loop and switch : ";echo'<br>';
	for ($i=0; $i<count($test); $i++) {
    switch( $test [$i]%2 ) {
    case 0:
      echo"index is";   echo $i;
         break 2;
    case 1:
        continue;
    }
  
}
 echo'<br>';  echo "using while and switch : ";echo'<br>'; 
 $J=0 ; 
 while($J != count($test)){
	 switch( $test [$J]%2 ) {
    case 0:
      echo"index is";   echo $J;
	  $J++;
         break 2;
    case 1:
	  $J++;
        continue;
    }
 }
?>