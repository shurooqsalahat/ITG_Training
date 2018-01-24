<html>
<head>
<style>
body
{
 background-color:#E6E6E6;
 font-family:helvetica;
}
#heading
{
 text-align:center;
 margin-top:150px;
 font-size:30px;
 color:blue;
}
#select_box
{
 width:500px;
 background-color:#819FF7;
 padding:10px;
 height:200px;
 border-radius:5px;
 box-shadow:0px 0px 10px 0px grey;
}
select
{
 width:400px;
 height:50px;
 border:1px solid #BDBDBD;
 margin-top:20px;
 padding:10px;
 font-size:20px;
 color:grey;
 border-radius:5px;
}
input
{
 width:400px;
 height:50px;
 border:1px solid #BDBDBD;
 margin-top:30px;
 padding:10px;
 font-size:20px;
 color:grey;
 border-radius:5px;
}

</style>

<link rel="stylesheet" type="text/css" href="select_style.css">
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js?ver=1.4.2'></script>


<script>

<script>

var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        myObj = JSON.parse(this.responseText);
        document.getElementsByClassName("demo").innerHTML = myObj.name;
    }
};
xmlhttp.open("GET", "action.php", true);
xmlhttp.send();

</script>


 <script>
function val() {
d = document.getElementById("selection").value;
document.getElementById("txt").value  = d;

}
</script>
</head>

<body onload="addoptions()">
<p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>

<center>
<div id="select_box">
 <select id ="selection" onchange="val()"  >
<option value ="0000"> select one</option>
  <input type ="text" id="txt">

 </select>
 

 <script>
 var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
    
    }
	for (x in myObj) {
var option = document.createElement("option");
option.text =myObj[x];
option.value = x;
var select = document.getElementById("selection");
select.appendChild(option);}
	
};
xmlhttp.open("GET", "action.php", true);
xmlhttp.send();

</script>





</div>
</center>
</body>
</html>