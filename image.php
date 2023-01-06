<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8"/>
    <title>Image Upload in PHP</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
 </head>
<body>
<form class="form" action="" method="post" enctype="multipart/form-data">
<h1 class="login-title">User Profile Page</h1>
<input type="text" class="login-input" name="first_name" placeholder="First Name" required />
<input type="text" class="login-input" name="email" placeholder="Email Adress" required />
<input type="date" class="login-input" name="dob" placeholder="DOB" required />
<input type="file" class="login-input" name="file" required/>
<input type="submit" class="login-button" name="submit" value="Upload">
</form>
<?php
require('db.php');
$msg = "";
if (isset($_POST["submit"])) {
    $first_name = stripslashes($_REQUEST['first_name']);
    //escapes special characters in a string
    $first_name = mysqli_real_escape_string($connection, $first_name);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($connection, $email);
    $dob = stripslashes($_REQUEST['dob']);
    $dob = mysqli_real_escape_string($connection, $dob);
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"]; 
    $fileerror = $_FILES['file']['error'];
    $files= $_FILES["file"];
        $folder = "image/".$filename;
        $sql = "INSERT into images (first_name, email, dob, file_name) VALUES ('$first_name', '$email', '$dob', '$folder')";
        mysqli_query($connection, $sql);       
        if (move_uploaded_file($tempname, $folder)) {
            // echo "<img src=".$folder." height=200 width=300 />";
            $msg = "Image uploaded successfully";
            header("Location: userProfile.php");
        }else{
            // echo "Not uploaded";
            $msg = "Failed to upload image";
    }
}
echo $msg;
?> 
</body>
</html>