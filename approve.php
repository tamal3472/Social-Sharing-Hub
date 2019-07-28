
<?php
if(isset($_GET['idp']))
{
$post_id= $_GET['idp'];

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT status
	      FROM save where idp=$post_id";
		  $res=mysqli_query($connect,$qry);
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $stat=$get["status"];
			  
			  if($stat=='approve')
			  {
				  $qryp="update save set status='pending'
				  where idp=$post_id";
				  $resp=mysqli_query($connect,$qryp);
			  }
			  else
			  {
				  $qrypd="update save set status='approve'
				  where idp=$post_id";
				  $respd=mysqli_query($connect,$qrypd);
			  }
		  }
}
header('Location: admin.php');
?>
</body>
</html>