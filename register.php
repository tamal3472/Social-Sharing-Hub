<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <title> 
        Share n learn!
    </title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/s3.css" />
    <link rel="icon" type="image" href="image/bic.gif">
</head>
<body>
<gffgf>
<nav id="top-menu">
    <ul>
        <li> <a href="home.php">Home</a> </li>
        <li> <a href="toprated.php">Top rated</a> </li>
         <li> <a href="member.php"> Members</a> </li>
         <li> <a href=""></a> </li>
        
        <li> <a href="login.php">Login</a> </li>
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>

<div  id="maindiv">
<header>
   <h1 style="color:#38396C ; font-size:50px; text-align:center; padding:50px;">Registration Page

   </h1>
  
   <h2 style="color:#020202;" >
   <pre
   
   
   />
      
      
        
        <form action="register.php" method="post" enctype="multipart/form-data" >
           Enter Username:&nbsp;<input type="text" name="username" value="<?php If(isset($user)){echo '$user';} ?>" required="required" placeholder="e.g* tom21" /> <br/>
           Enter Password:&nbsp;<input type="password" name="password" required="required" placeholder="e.g* tom1234" /> <br/>
           Full Name: <input type="text" name="fullname" value="<?php If(isset($fullname)){echo $fullname;} ?>" required="required" placeholder="e.g* Tom ch" /> <br/>
           Gender: <select name="gender"  required ="required" >
                 <option value='Male'>Male</option>
                 <option value='Female'>Female</option> </select> <br/>
           Profile Picture: <input type="file" name="image" /> <br/>
           Email: <input type="email" name="email" required="required" placeholder="e.g* tom@gmail.com" /> <br/>
           Current Working Position: <input type="text" name="position" value="<?php If(isset($position)){echo $position;} ?>" required="required"  placeholder= "e.g* Teacher/Student/Researcher etc" /> <br/>
        <div class="form">  <input type="submit"  name="login" value="Register"/></div>
        </form>
</h2>  
     
        
</header>

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
	   $user=mysqli_real_escape_string ($connect, $_POST["username"]);
	  
	   $password=mysqli_real_escape_string ($connect,$_POST["password"]);
	   $fullname=mysqli_real_escape_string ($connect,$_POST["fullname"]);
	   $gender=$_POST["gender"];
	   $image=$_FILES['image']['name'];
	   $tmp_image=$_FILES['image']['tmp_name'];
	   
	   $email=mysqli_real_escape_string ($connect,$_POST["email"]);
	   $position=mysqli_real_escape_string ($connect,$_POST["position"]);
	   
	    $user_trim=preg_replace('/\s+/','',$user);
	   if($user==$user_trim){
	   $bl=1;
	   $qry="SELECT *
	      FROM users";
		  $res=mysqli_query($connect,$qry);
		  while($get=mysqli_fetch_assoc($res))
		  {
			
			  
			  $dbreslt=$get["username"];
			  if( $dbreslt==$user)
			  {     $bl=0;
				 
			  
			  }
		  }
		 if( $bl==1){
		      $sql="INSERT INTO users (username,password,fullname,gender,profile,email,position,role) 
			  VALUES ('$user','$password','$fullname','$gender','$image','$email','$position','user')";
	          if($result=mysqli_query($connect,$sql)){
			  echo "<h3> congratulation!<br/>
			  now you are a registered member. ";
			  move_uploaded_file($tmp_image,"image/$image");
		
			  
			  }
		}
			  
	   }
	   
	   else{ print '<script>alert("space in username is invalid!")</script>';}
}
?>
<div class="clear"></div>
</div>

<footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>

</body>
</html>
