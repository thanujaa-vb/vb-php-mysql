<?php
require('db.php');
include("auth_session.php");
$id=$_REQUEST['id'];
$query = "SELECT * from users where id='".$id."'"; 
$result = mysqli_query($connection, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
<div style="display:flex;justify-content:space-between;">
<p><a href="viewRecords.php">View All Users</a> </p>
<p> <a href="registration.php">New Registration</a> </p>
<p> <a href="logout.php">Logout</a></p>
</div>
<h1>Update Record</h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$first_name =$_REQUEST['first_name'];
$last_name =$_REQUEST['last_name'];
$phone =$_REQUEST['phone'];
$email =$_REQUEST['email'];
// $password =$_REQUEST['password'];
$dob =$_REQUEST['dob'];
$update="update users set 
first_name='".$first_name."', last_name='".$last_name."', phone='".$phone."', email='".$email."',
dob='".$dob."' where id='".$id."'";
mysqli_query($connection, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br>
<a href='viewRecords.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div>
<form  name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" class="login-input" name="first_name" placeholder="First Name" 
required value="<?php echo $row['first_name'];?>" /></p>
<p><input type="text" class="login-input" name="last_name" placeholder="Last Name" 
required value="<?php echo $row['last_name'];?>" /></p>
<p><input type="text" class="login-input" name="phone" placeholder="Phone Number" 
required value="<?php echo $row['phone'];?>" /></p>
<p><input type="text" class="login-input" name="email" placeholder="Email" 
required value="<?php echo $row['email'];?>" /></p>
<p><input type="date" class="login-input" name="dob"  
required value="<?php echo $row['dob'];?>" /></p>
<p><input name="submit" class="login-button" type="submit" value="Update" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>