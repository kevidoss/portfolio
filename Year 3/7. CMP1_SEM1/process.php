<?php

$username = $_POST["user"];
$password = $_POST["pass"];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($username);
$password = mysqli_real_escape_string($password);

mysql_connect("localhost", "root", "bitnami");
mysql_select_db("blogdb");

$result = mysql_query("SELECT * FROM login WHERE username = '$username' and password = '$password'") or die("Failed to query database". mysql_error());
$row = mysql_fetch_array($result);

if($row['$username'] == $username) && $row['$password'] == $password){
    echo "Login success, welcome ". $row['$username'];
}
else{
    echo "Login failed: invalid login";
}

?>
