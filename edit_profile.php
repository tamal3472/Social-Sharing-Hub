
<?php ob_start(); 
session_start();

?>
<?php


if(!isset($_SESSION['username'])){
	
	header('Location: login.php');
}
else
{  $use_e=$_SESSION['username'];} ?>


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
<div class="comment-box">
                        <div class="row">
                            <div class="col-xs-12">
                            <form action="edit_profile.php" method="post"   enctype="multipart/form-data">
                                <div class="form-group">
                                        <label for="post">Change Fullname:</label>
                                        <textarea id="comment" name="fullname" placeholder="write your" class="form-control"></textarea>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="password">Change Password:</label>
                                        <textarea id="password" name="password" placeholder="write your" class="form-control"></textarea>
                                    </div>
                                     <div class="form-group">
                                        <label for="post">Change Email:</label>
                                        <textarea id="comment" name="email" placeholder="write your" class="form-control"></textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                     <label for="image">Change Profile Picture:</label>
                                     <input type="file" name="image" class="form-control" />
                                     </div>
                                      <div class="form-group">
                                        <label for="post">Change Details:</label>
                                        <textarea id="comment" name="details" cols="30" rows="10" placeholder="write your" class="form-control"></textarea>
                                    </div> 

                                    
                                    <input type="submit" name="submit" class="btn btn-primary" value="Confirm">
                                    </form>
                             

                            </div>
                        </div>
                    </div>
                </div>
                
                <?php



$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	

?>
<?php
if(isset($_POST["submit"]))
{     // $user_e=$use;
	   $fullname_e=$_POST["fullname"];
	    $password_e=$_POST["password"];
		 $email_e=$_POST["email"];
	      
	   
	   
	 
	   $image_e=$_FILES['image']['name'];
	   $tmp_image_e=$_FILES['image']['tmp_name'];
	   
	    $details_e=$_POST["details"];
	   

		 $sql_e="UPDATE `users` SET `password` = '$password_e', `fullname` = '$fullname_e', `profile` = '$image_e', `email` = '$email_e', `position` = '$details_e'
		  WHERE `users`.`username` = '$use_e'";
	          if($res=mysqli_query($connect,$sql_e)){
			  
			  print '<script>alert("congratulation!now your profile has been edited")</script>';
			  move_uploaded_file($tmp_image_e,"image/$image_e");
			  }
			  
			  
		}
			  
	   
	   

?>
</div>
        
        <footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>
</body>
</html>