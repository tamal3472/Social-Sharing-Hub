<?php ob_start(); 
session_start();

if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

?>

<?php
if(isset($_GET['pro']))
{
$parole= $_GET['pro'];

     if($parole!='admin')
    {
	header('Location: profile.php');
	
	}
		  
}
 ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

  
    <link rel="stylesheet" href="css/font-awesome.css">
    
    <link rel="stylesheet" href="css/animated.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/s2.css" />
    <link rel="icon" type="image" href="image/bic.gif">
    
</head>

</head>



  <body>
   <nav id="top-menu">
    <ul>
        <li> <a href="home.php">Home</a> </li>
        <li> <a href="profile.php">Profile</a> </li>
         <li> <a href="member.php"> Members</a> </li>
     
       
        <li class="back"> <a href="login.php">Login</a> </li>  
        <li> <a href="logout.php">Logout</a></li>
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>



<center>
<table class="table table-striped">
    <caption>
    <br>
        <center><h2>Admin &amp; Users list</h2></center>
        <br> <br>
    </caption>

    <tr >
        <th> Id </th>
        <th> Username </th>
        <th> Full Name</th>
        <th> Gender </th>
        <th> Image  </th>
        <th> Position</th>
        <th> Role </th>
    </tr>

<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM users ";
		  $res=mysqli_query($connect,$qry);
		  $counter2=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $idp=$get["id"];
			  
			  $usep=$get["username"];
			  $fullname=ucfirst($get["fullname"]);
			  $gender=$get["gender"];
			  $position=$get["position"];
			
			  $imagep=$get["profile"];
			  $status=$get["role"];
			  $datep=$get["jdate"];
			  	if(($counter2%2)==0){
	
         echo"  <tr>
        <td> $idp</td>
        <td> $usep </td>
        <td>   $fullname  </td>
		<td> $gender</td>
		
		
		<td><img src='image/$imagep' width='70px'/> </td>
		<td> $position</td>
		<td> <a href='approve_admin.php?idp=".$idp."'> $status</a></td>
        </tr> ";
			  }
			  
	else{
       echo" <tr class='odd'>
	 
        <td> $idp</td>
        <td> $usep </td>
        <td>   $fullname  </td>
		<td> $gender</td>
		
		
		<td><img src='image/$imagep' width='70px'/> </td>
		<td> $position</td>
		
		<td> <a href='approve_admin.php?idp=".$idp."'> $status</a></td>
        </tr>
       ";}

  $counter2=$counter2+1;

   
	  
	  }
			  
			  
			
		
		  ?>
          
      </table>    
      </center>
      
      </body>
      </html>
      


