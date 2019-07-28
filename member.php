
<?php ob_start(); 
session_start();
?>
<?php


if(!isset($_SESSION['username'])){
	header('Location: login.php');
}?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8" /> 
    <title> 
        Share n learn!
    </title>    
    <link rel="stylesheet" href="css/font-awesome.css">
    
    <link rel="stylesheet" href="css/animated.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/s2.css" />
    <link rel="icon" type="image" href="image/bic.gif">
    
</head>
<body><?php /*


if(!isset($_SESSION['username'])){
	header('Location: login.php');
}  */ ?>
<nav id="top-menu">
    <ul>
  

   <li> <a href="home.php">Home</a> </li>
        <li> <a href="profile.php">Profile</a> </li>
         <li> <a href="member.php"> Members</a> </li>
     
        <!-- <li> <input type="
        search" name="search" list="datalist"> </li>  //edited -->
        <li class="back"> <a href="login.php">Login</a> </li>  
        <li> <a href="logout.php">Logout</a></li>
       
        
    </ul>
</nav>
<center>
<div class="frm">
<form action="member.php" method="post">
           <h2> Search by the member name:<br/> </h2>&nbsp;<input type="text" name="search-title"  placeholder="e.g* tom21" /> 

            <input type="submit"  name="search" value="Go"/>
        </form>

</div>
 
        <?php
		if(isset($_POST["search"]))		
       {
	       $search=$_POST['search-title'];
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	


       $counter=0;
	   
	   $qry="SELECT *
	      FROM users WHERE fullname LIKE '%$search%'";
		  $res=mysqli_query($connect,$qry);
		  while($get=mysqli_fetch_assoc($res))
		  {    $id=$get['id'];
			  $dbresult=$get['fullname'];
			  $image=$get["profile"];
			 echo "<li> <a href='list.php?mem=".$id."'><img src='image/$image' width='50px'/> $dbresult</a> </li>";
			 $counter=1;
			  
           } 
		   if($counter==0) {echo 'no member found with your query'; }
	  
	   }
	  
?>
<br/>

<h1>
Members list
</h1>

<table>
    <caption>
        member
    </caption>

    <tr >
        <th><center> Picture</center> </th>
        <th><center> Name</center> </th>
        <th><center>Working position </center></th>
        <th><center> Join date</center> </th>
    </tr>

<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM users ORDER BY id DESC";
		  $res=mysqli_query($connect,$qry);
		  $counter1=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $dbreslt=ucfirst($get["fullname"]);
			  $id=$get["id"];
			  $image=$get["profile"];
			  $position=$get["position"];
			  $date=$get["jdate"];
			  
	if(($counter1%2)==0){
	
         echo"  <tr>
        <td> <a href='list.php?mem=".$id."'><img src='image/$image' width=100px'/></a></td>
        <td><center>  <a href='list.php?mem=".$id."'>  $dbreslt</a> </center> </td>
        <td> <center>$position</center> </td>
		<td><center> $date </center></td>
        </tr> ";
			  }
			  
	else{
       echo" <tr class='odd'>
        <td width='10%'><a href='list.php?mem=".$id."'><img src='image/$image' width='70px'/></a>  </td>
        <td> <center><a href='list.php?mem=".$id."'> $dbreslt </a></center> </td>
        <td><center> $position </center></td>
		<td><center> $date</center></td>
        </tr> ";}

  $counter1=$counter1+1;

   
	  
	  }
	  
?>


</table>
</center>
<br><br/><br><br/><br><br/>
<footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>
</body>
</html>