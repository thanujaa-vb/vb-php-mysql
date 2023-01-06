<?php
require('db.php');
// include("auth.php");
?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="utf-8"/>
    <title>Image Upload in PHP</title>
    <link rel="stylesheet" type="text/css" href="css/tablestyle.css" />
 </head>
<body>
<div class="tabledata">
<div style="display:flex;justify-content:space-between;">
<p> <a href="image.php">New Upload</a> </p>
</div>
<h1 style="text-align:center;">User Profile Upload Details</h1>
<table style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Email</strong></th>
<th><strong>DOB</strong></th> 
<th><strong>Uploaded Image</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from images";
$result = mysqli_query($connection,$sel_query);
// $row = mysqli_num_rows($result);
//  print_r(res);die;
while($res = mysqli_fetch_array($result)) { ?>
<tr><td><?php echo $count; ?></td>
<td><?php echo $res["first_name"]; ?></td>
<td><?php echo $res["email"]; ?></td>
<td><?php echo $res["dob"]; ?></td>
<td><img src= "<?php echo $res["file_name"];?>" height="100px" width="100px"></td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>