<form action="store.php" method="post">
    <input type="text" name="email" placeholder="Your email">
    <input type="password" name="password" placeholder="password">
    <input type="submit" name="submit">
</form>


if ($status){
$_SESSION['message'] = "<h3 style='color: green;'>Registration Succesful</h3><br>";
echo $_SESSION['message'];
header('location: signup.php');
}

<?php
session_start();
if(isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset ($_SESSION['message']);
}
?>