 <!DOCTYPE html>
<html>
<?php
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','','crime_portal');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $u_name=$_POST['name'];
        $u_id=$_POST['email'];
        $u_pass=$_POST['password'];
        $u_addr=$_POST['adress'];
        $a_no=$_POST['aadhar_number'];
        $gen=$_POST['gender'];
        $mob=$_POST['mobile_number'];
       // $password=md5($u_pass);
       $reg="insert into user values('$u_name','$u_id','$u_pass','$u_addr','$a_no','$gen','$mob')";
        mysqli_select_db("crime_portal");
        $res=mysqli_query($con, $reg);
        if(!$res)
        {
        $message1 = "User Already Exist";
        echo "<script type='text/javascript'>alert('$message1');</script>";
    }
            else
    {
        header("Location:userlogin.php");
    }
    }
}
?>    
    
<head>
<title>User Registration</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="reg.css">
</head>
<body> 
      <ul>
        <li><a href="index.php" style="color: white;font: size 1.6em;margin-top: 15%;">HomePage</a></li>
      </ul>

		<div class="form-reg">
        
      <div class="reg-form">
        <!-- <form action="register.php" method="POST"> -->
				<form action="#" method="post">
          <h2 style="color: white;font-size:1.3em;">Register!</h2>
				<input type="text"  name="name"  placeholder="Full Name" id="name1"  required/><br>
				<input type="email"  name="email"  placeholder="Email-Id" id="email1" required/><br>
        <input type="password"  name="password"  placeholder="Password"  id="pass" required /><br>
				<input type="text"  name="adress"  placeholder="Home address" id="addr" required /><br>
				<input type="text"  name="aadhar_number" placeholder="Huduma number" required  id="aadh" /><br>
					<select name="gender" style="padding: 10px 6em; border: none; outline:none; border-radius:2px;" required>
							<option>Male</option>
							<option>Female</option>
					</select><br>
				 <input type="text" name="mobile_number" placeholder="Mobile" required><br>
         <button name="s" class="btn" value="Submit" >Sign Up</button><br>
           <p>Already Registered?<a href="userlogin.php">Log in</a></p>
				</form>	
</div>
</div>
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: rgba(0,0,0,0.7);
   color: white;
   font-size: 1.3em;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Iantechie Designs</b></h4>
</div>
				
	
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>