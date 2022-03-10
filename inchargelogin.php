<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="usr.css">
	<title>Incharge Login</title>
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
        $result=mysqli_query($conn,"SELECT i_id,i_pass FROM police_station where i_id='$name' and i_pass='$pass' ");
        
        $_SESSION['email']=$name;
        if(!$result || mysqli_num_rows($result)==0)
        {
             $message = "Id or Password not Matched.";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else 
        {
          header("location:Incharge_complain_page.php");
        }
    }                
}
?> 
  
</head>
<body style="color: black;background-image: url(small.jpg);background-size: 100%;background-repeat: no-repeat;back">
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav" style="list-style-type:none;">
        <li ><a href="index.php" style="color:white;">HomePage</a></li>
        <li><a href="official_login.php" style="color:white;text-decoration:none;">Official Login</a></li>
        <li class="active"><a href="inchargelogin.php" style="color:white;text-decoration:none;">Incharge Login</a></li>
        
      </ul>
    </div>
  </div>
 
 <div class="form-reg">     
   <div class="reg-form">

		 <form method="post">
       <h3>Incharge Login</h3>
    <input type="text" name="email" class="input-group" placeholder="Enter User id" required > <br>
    <input type="password" name="password" class="input-group" placeholder="Password" required > <br>
    <button type="submit" class="btn" name="s">Submit</button>
   </form>
 </div>
 </div>

  <h4 style="color: black; text-align:center">&copy <b>Iantechie designs</b></h4> 
</body>
</html>