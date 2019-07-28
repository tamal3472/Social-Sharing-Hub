
<?php
if(isset($_GET['idp']))
{
$u_id= $_GET['idp'];

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT role
	      FROM users where id=$u_id";
		  $res=mysqli_query($connect,$qry);
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $stat=$get["role"];
			  
			  if($stat=='admin')
			  {
				  $qryp="update users set role='user'
				  where id=$u_id";
				  $resp=mysqli_query($connect,$qryp);
			  }
			  else
			  {
				  $qrypd="update users set role='admin'
				  where id=$u_id";
				  $respd=mysqli_query($connect,$qrypd);
			  }
		  }
}
header('Location: admin_list.php');
?>
</body>
</html>