<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Delete Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">
    <div style="display:flex;justify-content:space-between;">
<p><a href="viewRecords.php">View All Users</a> </p>
<p> <a href="registration.php">New Registration</a> </p>
<p> <a href="logout.php">Logout</a></p>
</div>
<?php
require('db.php');
$status = "";
$id=$_REQUEST['id'];
$query = "DELETE FROM users WHERE id=$id"; 
$result = mysqli_query($connection,$query) or die ( mysqli_error());
$status = "Record Deleted Successfully.";
echo '<p style="color:#FF0000;">'.$status.'</p>';
// header("Location: viewRecords.php"); 
?>
</body>
</html>