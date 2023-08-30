<?php
include "config.php";

session_start();
if (isset($_SESSION['loggeduserid'])){

    $id =$_SESSION['loggeduserid'];
    $sql="SELECT * FROM users WHERE id ='$id';";
    $run = mysqli_query($db, $sql);
    $val = mysqli_fetch_assoc($run);
    $name = $val['name'];
    $email = $val['email'];
    $dob = $val['dob'];
    $age = $val['age'];
    $mobile = $val['mobile'];
    $city = $val['city'];
    $state = $val['state'];
    $zip = $val['zip']; 
}
?>
