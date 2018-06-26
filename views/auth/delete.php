<?php

include("../../vendor/autoload.php");
use App\auth\auth;

$obj = new auth();
$obj->delete($_GET['101010101010101010101010101010']);