<?php
include ("../../vendor/autoload.php");
use App\auth\auth;

$obj = new auth();
$obj->setData($_POST)->store();