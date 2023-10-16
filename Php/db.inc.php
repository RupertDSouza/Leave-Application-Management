<?php
session_start();
$con=mysqli_connect('localhost','root','','leave_management_system');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}else
?>