<?php
require('db.php');
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/tablestyle.css"/>
</head>
<body>
<div class="tabledata">
<div style="display:flex;justify-content:space-between;">
<!-- <p><a href="viewRecords.php">View All Users</a> </p> -->
<p> <a href="registration.php">New Registration</a> </p>
<p> <a href="logout.php">Logout</a></p>
</div>
<h2>View All Users</h2>
<table style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>First Name</strong></th>
<th><strong>Last Name</strong></th>
<!-- <th><strong>Phone</strong></th> -->
<th><strong>Email</strong></th>
<!-- <th><strong>Password</strong></th>
<th><strong>DOB</strong></th> -->
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$sel_query="Select * from users ORDER BY id desc;";
$result = mysqli_query($connection,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td><?php echo $count; ?></td>
<td><?php echo $row["first_name"]; ?></td>
<td><?php echo $row["last_name"]; ?></td>
<!-- <td align="center"><?php echo $row["phone"]; ?></td> -->
<td><?php echo $row["email"]; ?></td>
<!-- <td align="center"><?php echo $row["password"]; ?></td>
<td align="center"><?php echo $row["dob"]; ?></td> -->
<td>
<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
</td>
<td>
<a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</body>
</html>