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
    <link rel="stylesheet" type="text/css" href="css/custom.css"/>
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
        <li> <a href="register.php">Register</a> </li>
        
    </ul>
</nav>



<div id="maindiv">
<header>
<h1 style="color:#38396C ; font-size:100px;    background-image: url(image/bic.gif);  background-position: right bottom, left top;
    background-repeat: repeat, repeat;
    background-size:contain;">
Share n Learn!
</h1>

       
    <p>  </p>
</header>


<article class="story">
    <header>
        <h1> The new generation sharing &amp; learning web portal </h1>
        
         <br>
    </header>
   

<div class="slideshow-container">
  <div class="mySlides fade">
    
    <img src="image/s4.jpg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

 

  <div class="mySlides fade">
    
    <img src="image/s6.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>
 <div class="mySlides fade">
   
    <img src="image/s10.png" style="width:100%">
    <div class="text"></div>
  </div>


</div>
<br>
<br>


<script>

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"
  setTimeout(showSlides, 2000); 
}


</script>




    <h1> How this website may useful to you? </h1>
    <p>
       <pre>
      
       -</pre>
    </p>
    <p>
      <pre>
       -
       -
       -
       -
       -
       -</pre>  
    </p>
    <!--   <a href="home.php"><img class="img-right" src="image/life.gif"
        alt="share n learn" title="share n learn" width=" 280" height="460" /></a> -->
       
    <p>
        <pre>
       -
       -
       -
       -
       -
       -
       -
       -
       -
       -</pre>
    </p>
</article>

<aside class="about">
    <header>
        <h1 style="color: #61AC0A "> Menu</h1>
        <p> just click! </p>
    </header>

    
    <section>
        <hgroup>
            <h1><a href="jt.php">Thesis &amp; Journal</a></h1>
            
        </hgroup>
       
    </section>
    <section>
        <hgroup>
            <h1> <a href="project.php">Projects</a> </h1>
           
        </hgroup>
       
    </section>
    <section>
        <hgroup>
            <h1> <a href="others.php">Others</a> </h1>
            
        </hgroup>
    </section>
    <h4>Social websites</h4>
    <section style="padding-left:3px">
    <a href="www.facebook.com"><img src="image/facebook.png"/></a> 
    <span > <a href="www.twitter.com"><img src="image/twitter.png"/></a></span>
    
    </section>
    
</aside>



<div class="clear"></div>
</div>

<footer>
    <p>
        Copyright &copy; Tamal Chakraborty,CSE,RUET.
    </p>
</footer>

</body>
</html>
