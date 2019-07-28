<?php ob_start(); 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <title> 
        Share n learn!
    </title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/s1.css" />
    <link href="css/animated.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <link rel="icon" type="image" href="image/bic.gif">

</head>
<body>

<nav id="top-menu">
    <ul>
        <li> <a href="home.php">Home</a> </li>
        <li> <a href="profile.php">Profile</a> </li>
        
         <li> <a href="member.php"> Members</a> </li>
          <li> <a href="profile.php">Profile</a> </li>
         <li> <a href=""></a>    </li>
     
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>



   <h1 style="color:#38396C ; font-size:50px; text-align: center;"><b>Login Page</b></h1>
   <div class="container">

      <form class="form-signin animated shake" action="login.php" method="POST">
        <h2 class="form-signin-heading">Share n Learn Login</h2>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        
        <input type="submit" name="login" value="Login" class="btn btn-lg btn-primary btn-block">
      </form>
      </div>
      
      
      <pre>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      </pre>
        
         

<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	

?>
<?php
if(isset($_POST["login"]))
{
	   $user=mysqli_real_escape_string($connect,$_POST["username"]);
	   $password=mysqli_real_escape_string($connect, $_POST["password"]);

	   
	   $bl=1;
	   $qry="SELECT *
	      FROM users WHERE username='$user' AND password='$password'";
		  $res=mysqli_query($connect,$qry);
	if(mysqli_num_rows ($res)>0)
	{     
			 $_SESSION['username']=$user;
		     header('Location: home.php');
			   
			  
		}
			else{ print '<script>alert("username & password missmatched!")</script>'; }  
			  
}
?>


<div class="clear"></div>


<footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>

</body>
</html>
