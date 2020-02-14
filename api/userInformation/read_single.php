<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: applicaton/json');

include_once '../../config/connectDB.php';
include_once '../../model/userInformation.php';

// //instantiate userInformation object
$userInfo = new UserInformation($connect);

//check for id parameter and get it
//recall that the query would be http://localhost/tedPrototype/api/userInformation/read_single.php?id=1
$inputId = isset($_GET['id']) ? $_GET['id'] : die();
$userInfo->id = $inputId;

$result = $userInfo->readSingle();

$row = $result->fetch_assoc();

echo json_encode($row);
