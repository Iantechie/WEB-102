<!DOCTYPE html>
<html>
<head>
<?php

    
if(isset($_POST['s']))
{
    session_start();
    $_SESSION['x']=1;
    $conn=mysqli_connect("localhost","root","","crime_portal");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db("crime_portal",$conn);
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $u_id=$_POST['email'];
        $_SESSION['u_id']=$u_id;
        $result=mysqli_query($conn,"SELECT u_id,u_pass FROM user where u_id='$name' and u_pass='$pass' ");
       
          
   
        
        if(!$result || mysqli_num_rows($result)==0)
        {
          $message = "Id or Password not Matched.";
          echo "<script type='text/javascript'>alert('$message');</script>";
          
             
        }
        else 
        {
          header("location:complainer_page.php");
          
        }
    }                
}
?> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="usr.css">  
	<title>Complainant Login</title>
</head>
<body style="background-size: cover;
    background-image: url(property_3.jpg);
    background-position: center;">
	
  <div class="container">
      <ul class="nav navbar-nav" style="list-style-type:none;">
        <li><a href="index.php" style="margin-top: 5%;color:white;">HomePage</a></li>
      </ul>     
  </div>
 
 
 <div class="form-reg">
        
      <div class="reg-form">
        <form action="userlogin.php" method="post">
            <h3 style="color:white;">Sign in</h3>
    
            <input type="email" class="input-group" placeholder="Enter Email id" required name="email" ><br>
    
            <input type="password" class="input-group" placeholder="Password" required name="password" ><br>
 
            <button name="s" class="btn">Log in</button><br>
         <p>Dont have an account?<a href="registration.php">Sign Up</a></p>
 
</form>
</div>
</div>


<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(0,0,0,0.7);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Iantechie Designs</b></h4>
</div>

</body>
</html>