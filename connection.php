<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$con = mysqli_connect("localhost", "root", "1234", "emp_db");
if(!$con){
    die ("connection error".mysqli_connect_error());
}
