<!DOCTYPE html>
<html>
<head>
 
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="usr.css">
	<title>Head Login</title>
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
        $result=mysqli_query($conn,"SELECT h_id,h_pass FROM head where h_id='$name' and h_pass='$pass' ");
        
        if(mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:headHome.php");
        }
    }                
}
?> 
</head>
<body style="color: black;background-image: url(small.jpg);background-size: 100%;background-repeat: no-repeat;back">

    
      <a class="navbar-brand" href="index.php" style="text-decoration: none;color:white;"><b>Homepage</b></a>
    
      <ul style="list-style-type: none;color: white;">
        <li><a href="official_login.php" style="color: white;text-decoration: none;">Official Login</a></li>
        <li class="active"><a href="headlogin.php" style="color: white;text-decoration: none;">HQ Login</a></li>
      </ul>
 
 <div  class="form-reg" >
  <div class="reg-form">
    <form method="post">
      <h3>HeadQ Login</h3>
    <input type="email" name="email" placeholder="HQ Id" class="input-group" required><br>
    <input type="password" placeholder="Password" name="password" class="input-group" placeholder="Password" required><br>
  <button type="submit" class="btn" name="s">Submit</button>
</form>
  </div>
</div>

 <h4 style="color: brickred; text-align:center;font-size: 1.4em; ">&copy <b>Iantechie designs</b></h4>


</body>
</html>