<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="usr.css">
	<title>Police Login</title>
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
    mysqli_select_db($conn, "crime_portal");
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $name=$_POST['email'];
        $pass=$_POST['password'];
        $result=mysqli_query($conn,"SELECT p_id,p_pass FROM police where p_id='$name' and p_pass='$pass' ");
        $_SESSION['pol']=$name;       
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:police_pending_complain.php");
        }
    }                
}
?> 
<style>

</style>   
</head>
<body style="color: black;background-image: url(small.jpg);background-size: 100%;background-repeat: no-repeat;">
	
    <div class="container">
        <ul class="nav navbar-nav" style="list-style-type:none;">
            <li ><a href="index.php" style="color:white;">HomePage</a></li>
           <li ><a href="official_login.php" style="color:white;">Official Login</a></li>
           <li class="active"><a href="policelogin.php" style="color:white;">Police Login</a></li>
        </ul>
  </div>
	 <div class="form-reg">
        
     <div class="reg-form" style="padding-top: 5em";>
	<form method="post">
    <h3>Police Login</h3>
    <input type="text" name="email" class="input-group" placeholder="Police Id" placeholder="Enter user id" required > <br>
    <input type="password" name="password" class="input-group" placeholder="Password" class="form-control"  placeholder="Password" required > <br>
    <button type="submit" class="btn" name="s">Submit</button>
  </form>
	</div>
</div>

  <h4 style="color: black; text-align:center">&copy <b>Iantechie designs</b></h4>

</body>
</html>