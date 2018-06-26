<?php
session_start();
if (!empty($_SESSION['user'])) {
    $_SESSION['message'] = "<h3 style='color: green;text-align: center'>Successfully Logged Out</h3><br>";
    unset ($_SESSION['user']);
    header('location:../../login.php');
}
else{
    $_SESSION['message'] = "<h3 style='color: orangered;text-align: center'>Dear..! You are not Logged in</h3><br>";
    header('location:../../login.php');
}
?>