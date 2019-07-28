<?php ob_start(); 
session_start();

if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

?>

<?php
if(isset($_GET['use']))
{
$prole= $_GET['use'];

     if($prole!='admin')
    {
	header('Location: profile.php');
	
	}
		  
}
 ?>
 <?php $padrole='admin'; ?>


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

<?php echo"<br><div class='col-md-10'><a href='admin_list.php?pro=".$padrole."' class='btn btn-primary pull-right'>Make new Admin</a><br></div>";?>

<center>
<table class="table table-striped">
    <caption>
        Post details
    </caption>

    <tr >
        <th> Id </th>
        <th> date </th>
        <th> Username </th>
        <th> Category </th>
        <th> Post_data  </th>
        <th> Image </th>
        <th> Status  </th>
    </tr>

<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM save ";
		  $res=mysqli_query($connect,$qry);
		  $counter2=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $idp=$get["idp"];
			  $datep=$get["date"];
			  $usep=$get["username"];
			  $category=$get["category"];
			  $postd=$get["post_data"];
			
			  $imagep=$get["image"];
			  $status=$get["status"];
			  
			  	if(($counter2%2)==0){
	
         echo"  <tr>
        <td> $idp</td>
        <td>   $datep  </td>
        <td> $usep </td>
		<td> $category</td>
		<td>". substr($postd,0,20)."  </td>
		<td><img src='image/$imagep' width='70px'/> </td>
		<td> <a href='approve.php?idp=".$idp."'> $status</a></td>
        </tr> ";
			  }
			  
	else{
       echo" <tr class='odd'>
        <td> $idp</td>
        <td>   $datep  </td>
        <td> $usep </td>
		<td> $category</td>
		<td>". substr($postd,0,20)." </td>
		<td><img src='image/$imagep' width='70px'/> </td>
		<td> <a href='approve.php?idp=".$idp."'> $status</a></td>
        </tr> ";}

  $counter2=$counter2+1;

   
	  
	  }
			  
			  
			
		
		  ?>
          
      </table>    
      </center>
      
      </body>
      </html>
      


