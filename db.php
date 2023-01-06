<?php 
  $host = "localhost"; //it will be a url if the database is on a remote server 
  $serverUser = "root"; //May vary if you changed settings in the php.ini file 
  $serverPass = ""; //password for phpmyadmin if not change make it an empty string 
  $databaseName = "UserLoginSystem"; //database name on phpmyadmin 
 
  $connection = mysqli_connect($host,$serverUser, $serverPass,$databaseName); //Specify MySQL connection 
  if(!$connection) //check if connection was successful 
  { 
     die("Error " . mysqli_connect_error()); 
  } 

  
?> 