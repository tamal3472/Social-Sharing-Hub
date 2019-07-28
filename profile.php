<?php ob_start(); 
session_start();

?>
<?php


if(!isset($_SESSION['username'])){
	
	header('Location: login.php');
}
else
{  $use=$_SESSION['username'];} ?>


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
     
        <!-- <li> <input type="
        search" name="search" list="datalist"> </li>  //edited -->
        <li class="back"> <a href="login.php">Login</a> </li>  
        <li> <a href="logout.php">Logout</a></li>
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>
<div id="profile">
<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM users WHERE username='$use' ORDER BY id DESC";
		  $res=mysqli_query($connect,$qry);
		  $counter1=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $fullname=$get["fullname"];
			  $id=$get["id"];
			  $image=$get["profile"];
			  $position=$get["position"];
			  $date=$get["jdate"];
			  $gender=$get["gender"];
			  $email=$get["email"];
			  $role=$get["role"];
			   
		  }
		  ?>



        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-2">
                   
                </div>
                <div class="col-md-9">
                    <h1 style="text-align:center"><i class="fa fa-user"></i> Profile <small>Personal Details</small></h1><hr>
                  
               <div class="row">
                   <div class="col-xs-12">
                       <center><img src="image/<?php echo $image;?>" width="350px" class="img-circle img-thumbnail" id="profile-image"></center><br>
                       <a href="edit_profile.php?edit=<?php echo $id;?>" class="btn btn-primary pull-right">Edit Profile</a><br><br>
                       <center>
                           <h3>Profile Details</h3>
                       </center>
                       <br>
                       <table class="table table-bordered">
                           <tr>
                               <td width="20%"><b>User ID:</b></td>
                               <td width="30%"><?php echo $id;?></td>
                               <td width="20%"><b>Signup Date:</b></td>
                               <td width="30%"><?php echo $date;?></td>
                           </tr>
                           <tr>
                               <td width="20%"><b>Full Name:</b></td>
                               <td width="30%"><?php echo $fullname;?></td>
                               <td width="20%"><b>Gender:</b></td>
                               <td width="30%"><?php echo $gender ;?></td>
                           </tr>
                           <tr>
                               <td width="20%"><b>Username:</b></td>
                               <td width="30%"><?php echo $use;?></td>
                               <td width="20%"><b>Email:</b></td>
                               <td width="30%"><?php echo $email;?></td>
                           </tr>
                           <tr>
                               <td width="20%"><b>Role:</b></td>
                               <td width="30%"><?php echo "<a href='admin.php?use=".$role."'> $role </a>" ;?></td>
                               <td width="20%"><b></b></td>
                               <td width="30%"></td>
                           </tr>
                       </table>
                       <div class="row">
                           <div class="col-lg-8 col-sm-12">
                               <b>Details:</b>
                               <div><?php echo $position;?></div>
                           </div>
                       </div><br>
                   </div>
               </div>
                </div>
            </div>
        </div>
        </div>
        <footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>
</body>
</html>