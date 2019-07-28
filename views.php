<?php ob_start(); 
session_start();
?>
<?php if(!isset($_SESSION['username'])){
	header('Location: login.php');
}

else
{  $use=$_SESSION['username'];}?>

<?php

if(isset($_GET['post_id']))
{
$view_id= $_GET['post_id'];

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   
	      $qr="update save set views=views+1
				  where idp=$view_id";
		  $res=mysqli_query($connect,$qr);
		  
		    $qry1="SELECT *
	      FROM users,save 
		  WHERE users.username=save.username AND save.idp=$view_id ;";
		  $res1=mysqli_query($connect,$qry1);
		 
		  while($get=mysqli_fetch_assoc($res1))
		  {
			 // static $bl=1;
			  
			  $fullname1=$get["fullname"];
			  $id1=$get["id"];
			  
			  $imagep=$get["profile"];
			
			 $image1=$get["image"];
			  $date1=$get["date"];
			  $postd1=$get["post_data"];
			  
			   
		

                    
                  
                        
                           
                             }
		  
}
	
		  ?>
		  
		  
		




<!doctype html>
<html>
<head>
<meta charset="utf-8">
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
 <script type="text/javascript">
        function init() {
            var n = 0;
            e = document.getElementById("output");
            setInterval(function() { e.innerHTML = ++n; }, 3600);
        }
        window.onload = init;
    </script>

<body>
<nav id="top-menu">
    <ul>
        <li> <a href="home.php">Home</a> </li>
        <li> <a href="profile.php">Profile</a> </li>
         <li> <a href="member.php"> Members</a> </li>
     
        <!-- <li> <input type="
        search" name="search" list="datalist"> </li>  //edited -->
        
        <li> <a href="logout.php">Logout</a></li>
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>


<section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
           
                    <div class="comment-box">
                        <div class="row">
                            <div class="col-xs-12">
                            <div class='col-xs-2'>
                                 <h5 style="float:right;"><?php echo "<a href='list.php?mem= ".$id1."'><img src='image/$imagep' width='70px' alt='Image 1'></a>";?></h5>
                                </div>
                                 <div class='col-xs-8 details'>
                                   <?php echo "<a href='list.php?mem= ".$id1."'> <h6>$fullname1 </h6></a>
                                    <p><i class='fa fa-clock-o'></i> $date1</p>";?>
                                </div>
                                
                            
                           
                            <h4> <?php echo "<img src='image/$image1' width='200px' alt='Image 1'> "; ?></h4>
                            <p> <?php echo $postd1; ?></p>
                            
                            <h6 style="color:#632C98">
	You have been reading this post for <span  id="output">0</span> seconds
	</h6>
                             

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
{
	   $post=$_POST["post"];
	  
	   $user=$use;
	   
	 
	   $image=$_FILES['image']['name'];
	   $tmp_image=$_FILES['image']['tmp_name'];

		 $sql="INSERT INTO `save` (`idp`, `date`, `username`, `category`, `post_data`,  `image`,`views`, `status`) 
		 VALUES (NULL, CURRENT_TIMESTAMP, '$use', 'journal', '$post','$image', '1', 'pending');";
	          if($result=mysqli_query($connect,$sql)){
			  
			  print '<script>alert("congratulation!now your post needs admin approval")</script>';
			  move_uploaded_file($tmp_image,"image/$image");
			  }
			  
			  
		}
			  
	   
	   
	 
?>
                
                
                
                
                
                
                <div class="col-md-4">
                   <div class="widgets">
                       <form action="jt.php" method="post">
                            <div class="input-group">
                              <input type="text" name="search-title" class="form-control" placeholder="Search for...">
                              <span class="input-group-btn">
                            <input type="submit" value="Go" class="btn btn-default" name="search">
                              </span>
                            </div><!-- /input-group -->
                        </form>
                    </div><!--widgets close-->
                    
					
					
					             <?php
if(isset($_POST["search"]))		
       {
	       $search=$_POST['search-title'];
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM users,save WHERE post_data LIKE '%$search%' AND status='approve' AND users.username=save.username  ORDER BY id DESC";
		  $res=mysqli_query($connect,$qry);
		  $counter1=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $fullnames=$get["fullname"];
			  $ids=$get["id"];
			  $idps=$get["idp"];
			  $images=$get["profile"];
			 // $position=$get["position"];
			 $images1=$get["image"];
			  $dates=$get["date"];
			  $postds=$get["post_data"];
			  //$gender=$get["gender"];
			 // $email=$get["email"];
			   
		

                    
                  
                           echo "<hr>
                            <div class='row'>
                                <div class='col-xs-4'>
                                    <a href='list.php?mem= ".$ids."'><img src='image/$images' width='70px' alt='Image 1'></a>
                                </div>
                                <div class='col-xs-8 details'>
                                    <a href='views.php?post_id=".$idps."'><h6>  $postds</h6></a>
                                    <p><i class='fa fa-clock-o'></i> $dates</p>
                                </div>
                            </div>";
                           
                           
                             }}
		  ?>
				<hr>
                            
				<h4 style="color:#6A60E5">Most Viewed Post</h4>	
							
					<?php

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="sharenlearn";
$connect=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);	



	   
	   $qry="SELECT *
	      FROM users,save WHERE users.username=save.username and status='approve'  ORDER BY views DESC";
		  $res=mysqli_query($connect,$qry);
		  $counter1=0;
		  while($get=mysqli_fetch_assoc($res))
		  {
			 // static $bl=1;
			  
			  $fullname=$get["fullname"];
			  $id=$get["id"];
			  $idp=$get["idp"];
			  $image=$get["profile"];
			 // $position=$get["position"];
			 $image1=$get["image"];
			  $date=$get["date"];
			  $postd=$get["post_data"];
			  $viewed=$get["views"];
			  
			   
		

                    
                  
                           echo "<div class='row'>	
							    
                                <div class='col-xs-4'>
                                    <a href='list.php?mem= ".$id."'><img src='image/$image' width='70px' alt='Image 1'></a>
                                </div>
                                <div class='col-xs-8 details'>
                                    <a href='views.php?post_id=".$idp."'><h6> ".substr($postd,0,25)."</h6></a>
									<p><i style='color:green'>viewed by $viewed members</i></p>
                                    <p><i class='fa fa-clock-o'></i> $date</p>
                                </div>
                            </div>";
                           
                           
                             }
		  ?>
                           
                            
                        </div>
                    </div><!--widgets close-->
                    
                    
                    
                
                    
                                   
                </div><!--side bar-->
                
                
                
                
                
                
                
            </div>
        </div>
    </section>
  
    	


<footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET(2017).
    </p>
</footer>
</body>
</html>			 
	  
		  



