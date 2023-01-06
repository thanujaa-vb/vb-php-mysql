<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['first_name'])) {
        // removes backslashes
        $first_name = stripslashes($_REQUEST['first_name']);
        //escapes special characters in a string
        $first_name = mysqli_real_escape_string($connection, $first_name);
        $last_name = stripslashes($_REQUEST['last_name']);
        $last_name = mysqli_real_escape_string($connection, $last_name);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($connection, $phone);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($connection, $password);
        $dob = stripslashes($_REQUEST['dob']);
        $dob = mysqli_real_escape_string($connection, $dob);
        $query    = "INSERT into `users` (first_name, last_name, password, email, phone, dob)
                     VALUES ('$first_name','$last_name', '" . md5($password) . "', '$email', '$phone', '$dob')";
        $result   = mysqli_query($connection, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  <p class='link'>Click here to <a href='registration.php'>Register another user</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="first_name" placeholder="First Name" required />
        <input type="text" class="login-input" name="last_name" placeholder="Last Name" required />
        <input type="number" class="login-input" name="phone" placeholder="Phone Number" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress" required />
        <input type="password" class="login-input" name="password" placeholder="Password" required />
        <input type="date" class="login-input" name="dob" placeholder="DOB" required />
        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>