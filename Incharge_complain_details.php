<!DOCTYPE html>
<html>
<head>
    
    <?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:inchargelogin.php");
    
        $conn=mysqli_connect("localhost","root","","crime_portal");
        if(!$conn)
        {
            die("could not connect".mysqli_error());
        }
        mysqli_select_db($conn, "crime_portal");
    
    $cid=$_SESSION['cid'];
        
    $i_id=$_SESSION['email'];
    $sq = "SELECT location FROM police_station where i_id='$i_id'";
    $result1=mysqli_query($conn, $sq);
      
    $q2=mysqli_fetch_assoc($result1);
    $location=$q2['location'];
    
    $query="select c_id,type_crime,d_o_c,description from complaint where c_id='$cid' and location='$location'";
    $result=mysqli_query($conn, $query); 
    if(isset($_POST['assign']))
    {
      if($_SERVER["REQUEST_METHOD"]=="POST")
      {
        $pname=$_POST['police_name'];
        $res1=mysqli_query("SELECT p_id FROM police where p_name='$pname'",$conn);
        $q3=mysqli_fetch_assoc($res1);
        $pid=$q3['p_id'];
      
      
        $res=mysqli_query("update complaint set inc_status='Assigned',pol_status='In Process',p_id='$pid' where c_id='$cid'",$conn);
      
        $message = "Case Assigned Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>

	<title>Assign Police</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
</head>
<body>
	
  <div class="container">
    <div id="navbar" class="collapse navbar-collapse">  
      <ul class="nav navbar-nav navbar-right">
        <li ><a href="Incharge_complain_page.php">View Complaints</a></li>
        <li class="active" ><a href="incharge_complain_details.php">Complaints Details</a></li>
        <li><a href="logout.php">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
  
<div style="padding:50px; margin-top:10px;">
   <table class="table table-bordered">
    <thead class="thead-dark" style="background-color: black; color: white;">
    <tr>
      <th scope="col">Complaint Id</th>
      <th scope="col">Type of Crime</th>
      <th scope="col">Date of Crime</th>
      <th scope="col">Description</th>
    </tr>
       </thead>
      <?php
              while($rows=mysqli_fetch_assoc($result)){
             ?> 
       <tbody style="background-color: white; color: black;">
    <tr>
        
      <td><?php echo $rows['c_id']; ?></td>
      <td><?php echo $rows['type_crime']; ?></td>
      <td><?php echo $rows['d_o_c']; ?></td>
      <td><?php echo $rows['description']; ?></td>
        
        
    </tr>
       </tbody>
       <?php
} 
?>
          
</table>
 </div>
 <div>  
<form method="post">
<select class="form-control" name="police_name" style="margin-left:40%; width:250px;">
            <?php
                        $p_name=mysqli_query("select p_name from police where location='$location'");
                        while($row=mysqli_fetch_array($p_name))
                        {
                            ?>
                                  <option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
          
            </select>
            <input type="submit" name="assign" value="Assign Case" class="btn btn-primary" style="margin-top:10px; margin-left:45%;">
</form>
 </div>
 
<div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b>Iantechie designs</b></h4>
</div>
 
</body>
</html>