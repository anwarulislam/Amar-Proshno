<?php

include("../../vendor/autoload.php");
use App\question\question;

$obj = new question();
$obj->setData($_POST)->store();